<?php
$role = 'admin';
$title = 'Course Assignments & Enrollments';
include '../includes/header.php';
?>

<h1 class='page-title'>Course Assignments &amp; Enrollments</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Current Assignments</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Assigned Teacher</th>
                    <th>Students</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Web Technologies</td>
                    <td>Dr. Hamza Ali</td>
                    <td>32</td>
                    <td>
                        <span class="pill">Active</span>
                    </td>
                </tr>

                <tr>
                    <td>Database Systems</td>
                    <td>Ms. Hira Malik</td>
                    <td>28</td>
                    <td>
                        <span class="pill">Active</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Assign Course (UI Demo)</h2>
    </div>

    <div class="card">
        <form method="get">
            <div class="form-grid">
                <label class="field ">
                    Course
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Teacher
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Student / Section
                    <input type="text" placeholder="" />
                </label>
            </div>

            <p>
                <button class="btn" type="submit">Preview Assignment</button>
            </p>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>