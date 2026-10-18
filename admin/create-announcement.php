
<?php

// ======================================
// PRESENT SIR - CREATE ANNOUNCEMENT
// ======================================

// 1. Authentication
require_once __DIR__ . '/../includes/auth.php';

// 2. Database connection
require_once __DIR__ . '/../includes/db.php';

// 3. Only Admin can access this page
requireAdmin();

// ======================================
// INITIAL VARIABLES
// ======================================

$error = '';

$announcementTitle = '';
$announcementMessage = '';
$targetRole = 'all';

// Allowed audiences
$allowedRoles = [
    'all',
    'admin',
    'teacher',
    'student'
];

// ======================================
// PROCESS FORM SUBMISSION
// ======================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // CSRF security verification
    $submittedToken = $_POST['csrf_token'] ?? '';

    if (
        !is_string($submittedToken) ||
        !hash_equals(
            $_SESSION['csrf_token'] ?? '',
            $submittedToken
        )
    ) {
        http_response_code(403);
        exit('Invalid request. Please refresh the page.');
    }

    // Get form data
    $announcementTitle = trim(
        is_string($_POST['title'] ?? null)
            ? $_POST['title']
            : ''
    );

    $announcementMessage = trim(
        is_string($_POST['message'] ?? null)
            ? $_POST['message']
            : ''
    );

    $targetRole = is_string($_POST['target_role'] ?? null)
        ? $_POST['target_role']
        : '';

    // ======================================
    // VALIDATION
    // ======================================

    if ($announcementTitle === '') {

        $error = 'Please enter announcement title.';

    } elseif (strlen($announcementTitle) > 150) {

        $error = 'Title must not exceed 150 characters.';

    } elseif ($announcementMessage === '') {

        $error = 'Please enter announcement message.';

    } elseif (strlen($announcementMessage) > 10000) {

        $error = 'Announcement message is too long.';

    } elseif (!in_array(
        $targetRole,
        $allowedRoles,
        true
    )) {

        $error = 'Please select a valid target audience.';

    } else {

        // ======================================
        // SAVE TO MYSQL
        // ======================================

        try {

            $sql = "
                INSERT INTO announcements
                (
                    author_id,
                    course_id,
                    title,
                    message,
                    target_role,
                    is_active
                )
                VALUES
                (
                    :author_id,
                    NULL,
                    :title,
                    :message,
                    :target_role,
                    1
                )
            ";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':author_id' => $_SESSION['user_id'],
                ':title' => $announcementTitle,
                ':message' => $announcementMessage,
                ':target_role' => $targetRole
            ]);

            // Redirect to avoid duplicate inserts
            // when the browser page is refreshed

            header(
                'Location: /present-sir/admin/create-announcement.php?created=1'
            );
            exit;

        } catch (PDOException $e) {

            error_log($e->getMessage());

            $error = 'Database error. Announcement could not be saved.';
        }
    }
}

// ======================================
// PAGE HEADER
// ======================================

$role = 'admin';
$title = 'Create Announcement';

include '../includes/header.php';

?>

<!-- PAGE TITLE -->

<div class="dashboard-intro">

    <h1 class="page-title">
        Create Announcement
    </h1>

    <p class="subtitle">
        Publish important updates for students,
        teachers, or the entire RCET workspace.
    </p>

</div>


<!-- SUCCESS MESSAGE -->

<?php if (($_GET['created'] ?? '') === '1'): ?>

    <div class="notice" role="status">

        Announcement published successfully!

    </div>

<?php endif; ?>


<!-- ERROR MESSAGE -->

<?php if ($error !== ''): ?>

    <div class="notice warn" role="alert">

        <?= htmlspecialchars(
            $error,
            ENT_QUOTES,
            'UTF-8'
        ) ?>

    </div>

<?php endif; ?>


<!-- ANNOUNCEMENT FORM -->

<section class="section">

    <div class="card">

        <div class="section-head">

            <h2>Announcement Details</h2>

        </div>

        <form
            action=""
            method="POST"
            class="form-grid"
        >

            <!-- CSRF TOKEN -->

            <input
                type="hidden"
                name="csrf_token"
                value="<?= htmlspecialchars(
                    $_SESSION['csrf_token'],
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>"
            >


            <!-- ANNOUNCEMENT TITLE -->

            <div class="field wide">

                <label for="announcement-title">
                    Announcement Title
                </label>

                <input
                    id="announcement-title"
                    type="text"
                    name="title"
                    placeholder="e.g. Midterm Examination Schedule"
                    maxlength="150"
                    value="<?= htmlspecialchars(
                        $announcementTitle,
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>"
                    required
                >

            </div>


            <!-- TARGET AUDIENCE -->

            <div class="field wide">

                <label for="target-role">
                    Target Audience
                </label>

                <select
                    id="target-role"
                    name="target_role"
                    required
                >

                    <option
                        value="all"
                        <?= $targetRole === 'all'
                            ? 'selected'
                            : '' ?>
                    >
                        Everyone
                    </option>

                    <option
                        value="student"
                        <?= $targetRole === 'student'
                            ? 'selected'
                            : '' ?>
                    >
                        All Students
                    </option>

                    <option
                        value="teacher"
                        <?= $targetRole === 'teacher'
                            ? 'selected'
                            : '' ?>
                    >
                        All Teachers
                    </option>

                    <option
                        value="admin"
                        <?= $targetRole === 'admin'
                            ? 'selected'
                            : '' ?>
                    >
                        Administrators Only
                    </option>

                </select>

            </div>


            <!-- ANNOUNCEMENT MESSAGE -->

            <div class="field wide">

                <label for="announcement-message">
                    Announcement Message
                </label>

                <textarea
                    id="announcement-message"
                    name="message"
                    rows="7"
                    placeholder="Write your announcement here..."
                    required
                ><?= htmlspecialchars(
                    $announcementMessage,
                    ENT_QUOTES,
                    'UTF-8'
                ) ?></textarea>

            </div>


            <!-- FORM BUTTONS -->

            <div class="wide flex">

                <button
                    type="submit"
                    class="btn"
                >
                    Publish Announcement
                </button>

                <a
                    href="dashboard.php"
                    class="btn secondary"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</section>


<?php include '../includes/footer.php'; ?>
