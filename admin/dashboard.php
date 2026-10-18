
<?php
require_once __DIR__ . '/../includes/auth.php';

requireAdmin();

$role = 'admin';
$title = 'Admin Dashboard';

include '../includes/header.php';
?>

<div class="dashboard-intro">
    <h1 class="page-title">Admin Dashboard</h1>

    <p class="subtitle">
        Manage your learning experience with clarity and confidence.
    </p>
</div>

<div class="section-head">

    <a
        href="create-announcement.php"
        class="btn teal"
    >
        + Create Announcement
    </a>
    <a
            href="manage-announcements.php"
            class="btn secondary"
        >
            Manage Announcements
        </a>

</div>

<!-- DASHBOARD STATISTICS -->

<div class="grid">

    <div class="card stat">
        <div class="caption">Total Students</div>
        <div class="value">248</div>
        <span class="pill blue">Enrolled</span>
    </div>

    <div class="card stat">
        <div class="caption">Teachers</div>
        <div class="value">18</div>
        <span class="pill">Faculty</span>
    </div>

    <div class="card stat">
        <div class="caption">Active Courses</div>
        <div class="value">12</div>
        <span class="pill blue">This semester</span>
    </div>

    <div class="card stat">
        <div class="caption">Published Quizzes</div>
        <div class="value">26</div>
        <span class="pill">Available</span>
    </div>

</div>

<!-- RECENT ENROLLMENTS -->

<section class="section">

    <div class="section-head">
        <h2>Recent Enrollments</h2>
    </div>

    <div class="card table-wrap">
        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Course</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>PS-1001</td>
                    <td>Ayesha Khan</td>
                    <td>Web Technologies</td>
                    <td>
                        <span class="pill">Active</span>
                    </td>
                </tr>

                <tr>
                    <td>PS-1002</td>
                    <td>Ali Raza</td>
                    <td>Database Systems</td>
                    <td>
                        <span class="pill">Active</span>
                    </td>
                </tr>

                <tr>
                    <td>PS-1003</td>
                    <td>Sara Ahmed</td>
                    <td>Information Security</td>
                    <td>
                        <span class="pill warn">Pending</span>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</section>

<?php include '../includes/footer.php'; ?>
