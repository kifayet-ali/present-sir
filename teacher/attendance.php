<?php
$role = 'teacher';
$title = 'Attendance Management';
include '../includes/header.php';
?>

<h1 class='page-title'>Attendance Management</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Class Attendance — October 10</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Roll Number</th>
                    <th>Attendance</th>
                    <th>Percentage</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Ayesha Khan</td>
                    <td>PS-1001</td>
                    <td>
                        <span class="pill">Present</span>
                    </td>
                    <td>94%</td>
                </tr>

                <tr>
                    <td>Ali Raza</td>
                    <td>PS-1002</td>
                    <td>
                        <span class="pill">Present</span>
                    </td>
                    <td>89%</td>
                </tr>

                <tr>
                    <td>Sara Ahmed</td>
                    <td>PS-1003</td>
                    <td>
                        <span class="pill warn">Absent</span>
                    </td>
                    <td>86%</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Record Attendance (UI Demo)</h2>
    </div>

    <div class="card">
        <form method="get">
            <div class="form-grid">
                <label class="field ">
                    Date
                    <input type="date" placeholder="" />
                </label>

                <label class="field ">
                    Course
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Student ID
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Status (Present / Absent)
                    <input type="text" placeholder="" />
                </label>
            </div>

            <p>
                <button class="btn" type="submit">Preview Attendance</button>
            </p>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>