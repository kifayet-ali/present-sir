<?php
$role = 'admin';
$title = 'Manage Courses';
include '../includes/header.php';
?>

<h1 class='page-title'>Manage Courses</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<div class="course-grid">
    <div class="card">
        <div class="course-banner">▣</div>
        <span class="pill blue">CS-301</span>
        <h3 style="margin-top:12px">Web Technologies</h3>
        <p class="muted">32 students · Fall Semester</p>
        <a class="btn secondary" href="../teacher/course-details.php">
            Open Course →
        </a>
    </div>

    <div class="card">
        <div class="course-banner">▣</div>
        <span class="pill blue">CS-305</span>
        <h3 style="margin-top:12px">Database Systems</h3>
        <p class="muted">28 students · Fall Semester</p>
        <a class="btn secondary" href="../teacher/course-details.php">
            Open Course →
        </a>
    </div>

    <div class="card">
        <div class="course-banner">▣</div>
        <span class="pill blue">CS-407</span>
        <h3 style="margin-top:12px">Information Security</h3>
        <p class="muted">35 students · Fall Semester</p>
        <a class="btn secondary" href="../teacher/course-details.php">
            Open Course →
        </a>
    </div>
</div>

<section class="section">
    <div class="section-head">
        <h2>New Course (UI Demo)</h2>
    </div>

    <div class="card">
        <form method="get">
            <div class="form-grid">
                <label class="field ">
                    Course Title
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Course Code
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Credit Hours
                    <input type="number" placeholder="" />
                </label>

                <label class="field ">
                    Semester
                    <input type="text" placeholder="" />
                </label>
            </div>

            <p>
                <button class="btn" type="submit">Preview Course</button>
            </p>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>