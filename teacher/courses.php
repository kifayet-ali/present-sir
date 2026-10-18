<?php
$role = 'teacher';
$title = 'My Courses';
include '../includes/header.php';
?>

<h1 class='page-title'>My Courses</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<div class="course-grid">
    <div class="card">
        <div class="course-banner">▣</div>
        <span class="pill blue">CS-301</span>
        <h3 style="margin-top:12px">Web Technologies</h3>
        <p class="muted">32 students · Fall Semester</p>
        <a class="btn secondary" href="course-details.php">
            Open Course →
        </a>
    </div>

    <div class="card">
        <div class="course-banner">▣</div>
        <span class="pill blue">CS-305</span>
        <h3 style="margin-top:12px">Database Systems</h3>
        <p class="muted">28 students · Fall Semester</p>
        <a class="btn secondary" href="course-details.php">
            Open Course →
        </a>
    </div>

    <div class="card">
        <div class="course-banner">▣</div>
        <span class="pill blue">CS-407</span>
        <h3 style="margin-top:12px">Information Security</h3>
        <p class="muted">35 students · Fall Semester</p>
        <a class="btn secondary" href="course-details.php">
            Open Course →
        </a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>