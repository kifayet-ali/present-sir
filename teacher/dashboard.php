

<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/db.php';

requireRole('teacher');

// Only active Admin announcements
// intended for Teachers or Everyone
$stmt = $pdo->prepare("
    SELECT
        a.announcement_id,
        a.title,
        a.message,
        a.created_at
    FROM announcements a
    INNER JOIN users u
        ON u.user_id = a.author_id
    WHERE a.is_active = 1
      AND a.course_id IS NULL
      AND u.role = 'admin'
      AND a.target_role IN ('all', 'teacher')
    ORDER BY a.created_at DESC, a.announcement_id DESC
    LIMIT 5
");

$stmt->execute();

$announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

$role = 'teacher';
$title = 'Teacher Dashboard';

include '../includes/header.php';
?>


<div class="dashboard-intro">
    <h1 class="page-title">Teacher Dashboard</h1>

    <p class="subtitle">
        Manage your learning experience with clarity and confidence.
    </p>
</div>

<!-- ADMIN ANNOUNCEMENTS -->

<section class="section announcement-feed">

    <div class="section-head">
        <h2>Campus Announcements</h2>
    </div>

    <?php if (empty($announcements)): ?>

        <div class="card">
            <p class="muted">
                No announcements available right now.
            </p>
        </div>

    <?php else: ?>

        <?php foreach ($announcements as $announcement): ?>

            <div class="card announcement-feed-card">

                <div class="announcement-feed-heading">

                    <h3>
                        <?= htmlspecialchars(
                            $announcement['title'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </h3>

                    <span class="pill blue">
                        Administration
                    </span>

                </div>

                <p class="muted announcement-date">
                    <?= htmlspecialchars(
                        date(
                            'd M Y, h:i A',
                            strtotime($announcement['created_at'])
                        ),
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </p>

                <p class="announcement-feed-message">
                    <?= htmlspecialchars(
                        $announcement['message'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </p>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</section>

<!-- DASHBOARD STATISTICS -->

<div class="grid">

    <div class="card stat">
        <div class="caption">My Courses</div>
        <div class="value">03</div>
        <span class="pill blue">Assigned</span>
    </div>

    <div class="card stat">
        <div class="caption">Students</div>
        <div class="value">95</div>
        <span class="pill">Across courses</span>
    </div>

    <div class="card stat">
        <div class="caption">Upcoming Quizzes</div>
        <div class="value">04</div>
        <span class="pill blue">Scheduled</span>
    </div>

    <div class="card stat">
        <div class="caption">Pending Reviews</div>
        <div class="value">12</div>
        <span class="pill warn">Action needed</span>
    </div>

</div>

<!-- MY COURSES -->

<section class="section">

    <div class="section-head">
        <h2>My Courses</h2>
    </div>

    <div class="course-grid">

        <!-- COURSE 1 -->

        <div class="card">
            <div class="course-banner">▣</div>

            <span class="pill blue">CS-301</span>

            <h3 class="course-title">
                Web Technologies
            </h3>

            <p class="muted">
                32 students · Fall Semester
            </p>

            <a
                class="btn secondary"
                href="course-details.php"
            >
                Open Course →
            </a>
        </div>

        <!-- COURSE 2 -->

        <div class="card">
            <div class="course-banner">▣</div>

            <span class="pill blue">CS-305</span>

            <h3 class="course-title">
                Database Systems
            </h3>

            <p class="muted">
                28 students · Fall Semester
            </p>

            <a
                class="btn secondary"
                href="course-details.php"
            >
                Open Course →
            </a>
        </div>

        <!-- COURSE 3 -->

        <div class="card">
            <div class="course-banner">▣</div>

            <span class="pill blue">CS-407</span>

            <h3 class="course-title">
                Information Security
            </h3>

            <p class="muted">
                35 students · Fall Semester
            </p>

            <a
                class="btn secondary"
                href="course-details.php"
            >
                Open Course →
            </a>
        </div>

    </div>

</section>

<!-- RECENT ACTIVITY -->

<section class="section">

    <div class="section-head">
        <h2>Recent Activity</h2>
    </div>

    <div class="card table-wrap">
        <table>

            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>Quiz 02 published</td>
                    <td>Web Technologies</td>
                    <td>Oct 12</td>
                    <td>
                        <span class="pill blue">
                            Scheduled
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>Assignment submissions</td>
                    <td>Database Systems</td>
                    <td>Oct 09</td>
                    <td>
                        <span class="pill warn">
                            Review
                        </span>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</section>

<?php include '../includes/footer.php'; ?>
