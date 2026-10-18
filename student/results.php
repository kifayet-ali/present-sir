<?php
$role = 'student';
$title = 'My Quiz Results';
include '../includes/header.php';
?>

<h1 class='page-title'>My Quiz Results</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Assessment History</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Quiz</th>
                    <th>Course</th>
                    <th>Score</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>HTML Basics Quiz</td>
                    <td>Web Technologies</td>
                    <td>18/20</td>
                    <td>
                        <span class="pill">Submitted</span>
                    </td>
                </tr>

                <tr>
                    <td>SQL Fundamentals</td>
                    <td>Database Systems</td>
                    <td>16/20</td>
                    <td>
                        <span class="pill">Submitted</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<div class="notice">
    Results are sample data for UI demonstration.
</div>

<?php include '../includes/footer.php'; ?>