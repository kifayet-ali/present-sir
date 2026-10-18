
<?php
// =========================================
// PRESENT SIR - MANAGE ANNOUNCEMENTS
// =========================================

require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/db.php';

requireAdmin();

// Logged-in Admin
$adminId = (int) $_SESSION['user_id'];

// Safely display text in HTML
function announcementEscape($value)
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

// Allowed announcement audiences
$allowedRoles = [
    'all',
    'admin',
    'teacher',
    'student'
];

// =========================================
// HANDLE FORM ACTIONS
// =========================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Security token check
    $token = $_POST['csrf_token'] ?? '';

    if (
        !is_string($token) ||
        empty($_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $token)
    ) {
        http_response_code(403);
        exit('Invalid request.');
    }

    $action = $_POST['action'] ?? '';

    $announcementId = filter_var(
        $_POST['announcement_id'] ?? null,
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1]]
    );

    if (!$announcementId) {
        header('Location: manage-announcements.php?status=invalid');
        exit;
    }

    try {

        // Admin can manage only their own
        // general announcements.
        $check = $pdo->prepare("
            SELECT announcement_id
            FROM announcements
            WHERE announcement_id = ?
              AND author_id = ?
              AND course_id IS NULL
            LIMIT 1
        ");

        $check->execute([
            $announcementId,
            $adminId
        ]);

        if (!$check->fetch()) {
            header('Location: manage-announcements.php?status=notfound');
            exit;
        }

        // =================================
        // UPDATE ANNOUNCEMENT
        // =================================

        if ($action === 'update') {

            $title = $_POST['title'] ?? '';
            $message = $_POST['message'] ?? '';
            $targetRole = $_POST['target_role'] ?? '';

            if (
                !is_string($title) ||
                !is_string($message) ||
                !is_string($targetRole)
            ) {
                header('Location: manage-announcements.php?status=invalid');
                exit;
            }

            $title = trim($title);
            $message = trim($message);

            if (
                $title === '' ||
                strlen($title) > 150 ||
                $message === '' ||
                strlen($message) > 10000 ||
                !in_array($targetRole, $allowedRoles, true)
            ) {
                header('Location: manage-announcements.php?status=invalid');
                exit;
            }

            $stmt = $pdo->prepare("
                UPDATE announcements
                SET
                    title = ?,
                    message = ?,
                    target_role = ?
                WHERE announcement_id = ?
                  AND author_id = ?
                  AND course_id IS NULL
            ");

            $stmt->execute([
                $title,
                $message,
                $targetRole,
                $announcementId,
                $adminId
            ]);

            header('Location: manage-announcements.php?status=updated');
            exit;
        }

        // =================================
        // ACTIVATE / DEACTIVATE
        // =================================

        if ($action === 'toggle') {

            $stmt = $pdo->prepare("
                UPDATE announcements
                SET is_active = CASE
                    WHEN is_active = 1 THEN 0
                    ELSE 1
                END
                WHERE announcement_id = ?
                  AND author_id = ?
                  AND course_id IS NULL
            ");

            $stmt->execute([
                $announcementId,
                $adminId
            ]);

            header('Location: manage-announcements.php?status=toggled');
            exit;
        }

        // =================================
        // DELETE ANNOUNCEMENT
        // =================================

        if ($action === 'delete') {

            $stmt = $pdo->prepare("
                DELETE FROM announcements
                WHERE announcement_id = ?
                  AND author_id = ?
                  AND course_id IS NULL
            ");

            $stmt->execute([
                $announcementId,
                $adminId
            ]);

            header('Location: manage-announcements.php?status=deleted');
            exit;
        }

        header('Location: manage-announcements.php?status=invalid');
        exit;

    } catch (PDOException $e) {

        error_log($e->getMessage());

        header('Location: manage-announcements.php?status=error');
        exit;
    }
}

// =========================================
// FETCH ADMIN ANNOUNCEMENTS
// =========================================

$stmt = $pdo->prepare("
    SELECT
        announcement_id,
        title,
        message,
        target_role,
        is_active,
        created_at
    FROM announcements
    WHERE author_id = ?
      AND course_id IS NULL
    ORDER BY created_at DESC, announcement_id DESC
");

$stmt->execute([$adminId]);

$announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

// =========================================
// OPTIONAL VIEW / EDIT / DELETE SCREEN
// =========================================

$mode = $_GET['mode'] ?? 'list';

if (!in_array($mode, ['list', 'view', 'edit', 'delete'], true)) {
    $mode = 'list';
}

$selected = null;
$pageError = '';

if ($mode !== 'list') {

    $selectedId = filter_var(
        $_GET['id'] ?? null,
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1]]
    );

    if (!$selectedId) {

        $mode = 'list';
        $pageError = 'Invalid announcement ID.';

    } else {

        $selectedStmt = $pdo->prepare("
            SELECT
                announcement_id,
                title,
                message,
                target_role,
                is_active,
                created_at
            FROM announcements
            WHERE announcement_id = ?
              AND author_id = ?
              AND course_id IS NULL
            LIMIT 1
        ");

        $selectedStmt->execute([
            $selectedId,
            $adminId
        ]);

        $selected = $selectedStmt->fetch(PDO::FETCH_ASSOC);

        if (!$selected) {
            $mode = 'list';
            $pageError = 'Announcement not found.';
        }
    }
}

// =========================================
// EXISTING WEBSITE HEADER
// =========================================

$role = 'admin';
$title = 'Manage Announcements';

include '../includes/header.php';
?>

<!-- =====================================
     PAGE HEADING
===================================== -->

<div class="dashboard-intro">

    <h1 class="page-title">
        Manage Announcements
    </h1>

    <p class="subtitle">
        View, edit, activate, deactivate or delete
        your announcements.
    </p>

</div>

<!-- =====================================
     FEEDBACK MESSAGES
===================================== -->

<?php
$messages = [
    'updated' => 'Announcement updated successfully!',
    'toggled' => 'Announcement status changed successfully!',
    'deleted' => 'Announcement deleted successfully!',
    'invalid' => 'Invalid details. Please check and try again.',
    'notfound' => 'Announcement not found.',
    'error' => 'Something went wrong. Please try again.'
];

$status = $_GET['status'] ?? '';

if (isset($messages[$status])):
?>

    <div
        class="notice <?= in_array(
            $status,
            ['updated', 'toggled', 'deleted'],
            true
        ) ? '' : 'warn' ?>"
        role="status"
    >
        <?= announcementEscape($messages[$status]) ?>
    </div>

<?php endif; ?>

<?php if ($pageError !== ''): ?>

    <div class="notice warn" role="alert">
        <?= announcementEscape($pageError) ?>
    </div>

<?php endif; ?>


<!-- =====================================
     VIEW ANNOUNCEMENT
===================================== -->

<?php if ($mode === 'view' && $selected): ?>

    <section class="section">

        <div class="card">

            <h2><?= announcementEscape($selected['title']) ?></h2>

            <p class="muted">
                Audience:
                <?= announcementEscape(
                    ucfirst($selected['target_role'])
                ) ?>
            </p>

            <p class="muted">
                Created:
                <?= announcementEscape($selected['created_at']) ?>
            </p>

            <p class="muted">
                Status:
                <?= $selected['is_active']
                    ? 'Active'
                    : 'Inactive' ?>
            </p>

            <div class="announcement-message">
                <?= announcementEscape($selected['message']) ?>
            </div>

            <div class="flex announcement-bottom-actions">

                <a
                    class="btn"
                    href="?mode=edit&id=<?= (int) $selected['announcement_id'] ?>"
                >
                    Edit Announcement
                </a>

                <a
                    class="btn secondary"
                    href="manage-announcements.php"
                >
                    Back to List
                </a>

            </div>

        </div>

    </section>


<!-- =====================================
     EDIT ANNOUNCEMENT
===================================== -->

<?php elseif ($mode === 'edit' && $selected): ?>

    <section class="section">

        <div class="card">

            <div class="section-head">
                <h2>Edit Announcement</h2>
            </div>

            <form method="POST" class="form-grid">

                <input
                    type="hidden"
                    name="csrf_token"
                    value="<?= announcementEscape(
                        $_SESSION['csrf_token']
                    ) ?>"
                >

                <input
                    type="hidden"
                    name="action"
                    value="update"
                >

                <input
                    type="hidden"
                    name="announcement_id"
                    value="<?= (int) $selected['announcement_id'] ?>"
                >

                <div class="field wide">

                    <label for="edit-title">
                        Announcement Title
                    </label>

                    <input
                        id="edit-title"
                        type="text"
                        name="title"
                        maxlength="150"
                        value="<?= announcementEscape(
                            $selected['title']
                        ) ?>"
                        required
                    >

                </div>

                <div class="field wide">

                    <label for="edit-role">
                        Target Audience
                    </label>

                    <select
                        id="edit-role"
                        name="target_role"
                        required
                    >

                        <?php foreach ($allowedRoles as $audience): ?>

                            <option
                                value="<?= announcementEscape($audience) ?>"
                                <?= $selected['target_role'] === $audience
                                    ? 'selected'
                                    : '' ?>
                            >
                                <?= $audience === 'all'
                                    ? 'Everyone'
                                    : ucfirst($audience) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="field wide">

                    <label for="edit-message">
                        Announcement Message
                    </label>

                    <textarea
                        id="edit-message"
                        name="message"
                        rows="7"
                        required
                    ><?= announcementEscape(
                        $selected['message']
                    ) ?></textarea>

                </div>

                <div class="wide flex">

                    <button type="submit" class="btn">
                        Save Changes
                    </button>

                    <a
                        href="manage-announcements.php"
                        class="btn secondary"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </section>


<!-- =====================================
     DELETE CONFIRMATION
===================================== -->

<?php elseif ($mode === 'delete' && $selected): ?>

    <section class="section">

        <div class="card">

            <h2>Delete Announcement?</h2>

            <p>
                Are you sure you want to permanently
                delete this announcement?
            </p>

            <p>
                <strong>
                    <?= announcementEscape($selected['title']) ?>
                </strong>
            </p>

            <div class="notice warn">
                This action cannot be undone.
            </div>

            <form method="POST" class="announcement-delete-form">

                <input
                    type="hidden"
                    name="csrf_token"
                    value="<?= announcementEscape(
                        $_SESSION['csrf_token']
                    ) ?>"
                >

                <input
                    type="hidden"
                    name="action"
                    value="delete"
                >

                <input
                    type="hidden"
                    name="announcement_id"
                    value="<?= (int) $selected['announcement_id'] ?>"
                >

                <button
                    type="submit"
                    class="btn announcement-danger"
                >
                    Yes, Delete Permanently
                </button>

                <a
                    href="manage-announcements.php"
                    class="btn secondary"
                >
                    Cancel
                </a>

            </form>

        </div>

    </section>


<!-- =====================================
     ALL ANNOUNCEMENTS LIST
===================================== -->

<?php else: ?>

    <section class="section">

        <div class="section-head">

            <h2>My Announcements</h2>

            <a
                href="create-announcement.php"
                class="btn teal"
            >
                + Create New
            </a>

        </div>

        <div class="card table-wrap">

            <?php if (empty($announcements)): ?>

                <div class="announcement-empty">

                    <h3>No Announcements Yet</h3>

                    <p class="muted">
                        Create your first announcement
                        to get started.
                    </p>

                    <a
                        href="create-announcement.php"
                        class="btn"
                    >
                        Create Announcement
                    </a>

                </div>

            <?php else: ?>

                <table>

                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Audience</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($announcements as $item): ?>

                        <tr>

                            <td>
                                <strong>
                                    <?= announcementEscape(
                                        $item['title']
                                    ) ?>
                                </strong>
                            </td>

                            <td>
                                <?= announcementEscape(
                                    ucfirst($item['target_role'])
                                ) ?>
                            </td>

                            <td>
                                <?= announcementEscape(
                                    date(
                                        'd M Y',
                                        strtotime($item['created_at'])
                                    )
                                ) ?>
                            </td>

                            <td>

                                <?php if ($item['is_active']): ?>

                                    <span class="pill">
                                        Active
                                    </span>

                                <?php else: ?>

                                    <span class="pill warn">
                                        Inactive
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <div class="announcement-actions">

                                    <a
                                        class="btn secondary"
                                        href="?mode=view&id=<?= (int) $item['announcement_id'] ?>"
                                    >
                                        View
                                    </a>

                                    <a
                                        class="btn secondary"
                                        href="?mode=edit&id=<?= (int) $item['announcement_id'] ?>"
                                    >
                                        Edit
                                    </a>

                                    <form method="POST">

                                        <input
                                            type="hidden"
                                            name="csrf_token"
                                            value="<?= announcementEscape(
                                                $_SESSION['csrf_token']
                                            ) ?>"
                                        >

                                        <input
                                            type="hidden"
                                            name="action"
                                            value="toggle"
                                        >

                                        <input
                                            type="hidden"
                                            name="announcement_id"
                                            value="<?= (int) $item['announcement_id'] ?>"
                                        >

                                        <button
                                            type="submit"
                                            class="btn secondary"
                                        >
                                            <?= $item['is_active']
                                                ? 'Deactivate'
                                                : 'Activate' ?>
                                        </button>

                                    </form>

                                    <a
                                        class="btn announcement-danger-outline"
                                        href="?mode=delete&id=<?= (int) $item['announcement_id'] ?>"
                                    >
                                        Delete
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            <?php endif; ?>

        </div>

    </section>

<?php endif; ?>

<?php include '../includes/footer.php'; ?>
