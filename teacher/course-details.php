<?php
$role = 'teacher';
$title = 'Web Technologies — Course Details';
include '../includes/header.php';
?>

<h1 class='page-title'>Web Technologies — Course Details</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<div class="grid">
    <div class="card stat">
        <div class="caption">Enrolled Students</div>
        <div class="value">32</div>
        <span class="pill ">Active</span>
    </div>

    <div class="card stat">
        <div class="caption">Attendance</div>
        <div class="value">91%</div>
        <span class="pill ">Average</span>
    </div>

    <div class="card stat">
        <div class="caption">Assignments</div>
        <div class="value">06</div>
        <span class="pill ">Published</span>
    </div>

    <div class="card stat">
        <div class="caption">Quizzes</div>
        <div class="value">04</div>
        <span class="pill blue">Created</span>
    </div>
</div>

<section class="section">
    <div class="section-head">
        <h2>Course Management</h2>
    </div>

    <div class="grid">
        <div class="card">
            <h3>Attendance</h3>
            <p class="muted">Record student presence</p>
            <a class="btn secondary" href="attendance.php">Open →</a>
        </div>

        <div class="card">
            <h3>Gradebook</h3>
            <p class="muted">Track assessment marks</p>
            <a class="btn secondary" href="marks.php">Open →</a>
        </div>

        <div class="card">
            <h3>Assignments</h3>
            <p class="muted">Manage coursework</p>
            <a class="btn secondary" href="assignments.php">Open →</a>
        </div>

        <div class="card">
            <h3>Quizzes</h3>
            <p class="muted">Create and review tests</p>
            <a class="btn secondary" href="quizzes.php">Open →</a>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>