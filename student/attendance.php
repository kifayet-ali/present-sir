<?php
$role = 'student';
$title = 'My Attendance & Marks';
include '../includes/header.php';
?>

<h1 class='page-title'>My Attendance &amp; Marks</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<div class="grid">
    <div class="card stat">
        <div class="caption">Attendance</div>
        <div class="value">92%</div>
        <span class="pill ">Overall</span>
    </div>

    <div class="card stat">
        <div class="caption">Quiz Average</div>
        <div class="value">86%</div>
        <span class="pill blue">Performance</span>
    </div>

    <div class="card stat">
        <div class="caption">Assignments</div>
        <div class="value">08</div>
        <span class="pill ">Completed</span>
    </div>

    <div class="card stat">
        <div class="caption">Courses</div>
        <div class="value">03</div>
        <span class="pill ">Enrolled</span>
    </div>
</div>

<section class="section">
    <div class="section-head">
        <h2>Attendance by Course</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Present</th>
                    <th>Total Classes</th>
                    <th>Percentage</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Web Technologies</td>
                    <td>23</td>
                    <td>25</td>
                    <td>92%</td>
                </tr>

                <tr>
                    <td>Database Systems</td>
                    <td>22</td>
                    <td>24</td>
                    <td>92%</td>
                </tr>

                <tr>
                    <td>Information Security</td>
                    <td>20</td>
                    <td>22</td>
                    <td>91%</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Recent Marks</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Assessment</th>
                    <th>Course</th>
                    <th>Score</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Quiz 01</td>
                    <td>Web Technologies</td>
                    <td>18/20</td>
                </tr>

                <tr>
                    <td>Assignment 02</td>
                    <td>Database Systems</td>
                    <td>19/20</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<?php include '../includes/footer.php'; ?>