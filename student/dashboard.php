

<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/db.php';

requireRole('student');

// Only active Admin announcements
// intended for Students or Everyone
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
      AND a.target_role IN ('all', 'student')
    ORDER BY a.created_at DESC, a.announcement_id DESC
    LIMIT 5
");

$stmt->execute();

$announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

$role = 'student';
$title = 'Student Dashboard';

include '../includes/header.php';
?>


<div class="dashboard-intro">
    <h1 class="page-title">Student Dashboard</h1>

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
        <div class="caption">Enrolled Courses</div>
        <div class="value">03</div>
        <span class="pill blue">Active</span>
    </div>

    <div class="card stat">
        <div class="caption">Attendance</div>
        <div class="value">92%</div>
        <span class="pill">Overall</span>
    </div>

    <div class="card stat">
        <div class="caption">Pending Tasks</div>
        <div class="value">02</div>
        <span class="pill warn">Due soon</span>
    </div>

    <div class="card stat">
        <div class="caption">Upcoming Quizzes</div>
        <div class="value">01</div>
        <span class="pill blue">Scheduled</span>
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

            <a class="btn secondary" href="courses.php">
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

            <a class="btn secondary" href="courses.php">
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

            <a class="btn secondary" href="courses.php">
                Open Course →
            </a>
        </div>

    </div>

</section>

<!-- UPCOMING ASSESSMENTS -->

<section class="section">

    <div class="section-head">
        <h2>Upcoming Assessments</h2>
    </div>

    <div class="card table-wrap">
        <table>

            <thead>
                <tr>
                    <th>Assessment</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>HTML Basics Quiz</td>
                    <td>Web Technologies</td>
                    <td>Oct 12</td>
                    <td>
                        <a
                            class="btn secondary"
                            href="../quiz/waiting.php"
                        >
                            View Quiz
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</section>

<?php include '../includes/footer.php'; ?>
