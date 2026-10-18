<?php
$role = 'teacher';
$title = 'Learning Materials';
include '../includes/header.php';
?>

<h1 class='page-title'>Learning Materials</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Uploaded Resources</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Resource</th>
                    <th>Type</th>
                    <th>Course</th>
                    <th>Availability</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>HTML & CSS Notes</td>
                    <td>PDF</td>
                    <td>Web Technologies</td>
                    <td>
                        <span class="pill">Published</span>
                    </td>
                </tr>

                <tr>
                    <td>Database Fundamentals</td>
                    <td>Slides</td>
                    <td>Database Systems</td>
                    <td>
                        <span class="pill">Published</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Add Material (UI Demo)</h2>
    </div>

    <div class="card">
        <form method="get">
            <div class="form-grid">
                <label class="field ">
                    Resource Title
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Course
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Resource Type
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    File Name
                    <input type="text" placeholder="" />
                </label>
            </div>

            <p>
                <button class="btn" type="submit">Preview Resource</button>
            </p>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>