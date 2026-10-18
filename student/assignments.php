<?php
$role = 'student';
$title = 'My Assignments';
include '../includes/header.php';
?>

<h1 class='page-title'>My Assignments</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Upcoming Deadlines</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Assignment</th>
                    <th>Course</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Responsive Web Layout</td>
                    <td>Web Technologies</td>
                    <td>Oct 15</td>
                    <td>
                        <span class="pill warn">Pending</span>
                    </td>
                </tr>

                <tr>
                    <td>ER Diagram</td>
                    <td>Database Systems</td>
                    <td>Oct 18</td>
                    <td>
                        <span class="pill">Submitted</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Submission (UI Demo)</h2>
    </div>

    <div class="card">
        <form method="get">
            <div class="form-grid">
                <label class="field ">
                    Assignment Name
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Submission Notes
                    <input type="text" placeholder="Enter your notes" />
                </label>
            </div>

            <p>
                <button class="btn" type="submit">Preview Submission</button>
            </p>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>