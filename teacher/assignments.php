<?php
$role = 'teacher';
$title = 'Assignments & Class Tasks';
include '../includes/header.php';
?>

<h1 class='page-title'>Assignments &amp; Class Tasks</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Active Coursework</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Course</th>
                    <th>Due Date</th>
                    <th>Submissions</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Responsive Web Layout</td>
                    <td>Web Technologies</td>
                    <td>Oct 15</td>
                    <td>21/32</td>
                </tr>

                <tr>
                    <td>ER Diagram</td>
                    <td>Database Systems</td>
                    <td>Oct 18</td>
                    <td>16/28</td>
                </tr>

                <tr>
                    <td>Security Basics</td>
                    <td>Information Security</td>
                    <td>Oct 20</td>
                    <td>11/35</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Create Assignment (UI Demo)</h2>
    </div>

    <div class="card">
        <form method="get">
            <div class="form-grid">
                <label class="field ">
                    Assignment Title
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Course
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Due Date
                    <input type="date" placeholder="" />
                </label>

                <label class="field ">
                    Total Marks
                    <input type="number" placeholder="" />
                </label>

                <label class="field wide">
                    Instructions
                    <input type="text" placeholder="Write assignment details" />
                </label>
            </div>

            <p>
                <button class="btn" type="submit">Preview Assignment</button>
            </p>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>