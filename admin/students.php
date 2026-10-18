<?php
$role = "admin";
$title = "Manage Students";
include "../includes/header.php";
?>

<h1 class='page-title'>Manage Students</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Student Directory</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>PS-1001</td>
                    <td>Ayesha Khan</td>
                    <td>Web Technologies</td>
                    <td>
                        <span class="pill">Active</span>
                    </td>
                </tr>

                <tr>
                    <td>PS-1002</td>
                    <td>Ali Raza</td>
                    <td>Database Systems</td>
                    <td>
                        <span class="pill">Active</span>
                    </td>
                </tr>

                <tr>
                    <td>PS-1003</td>
                    <td>Sara Ahmed</td>
                    <td>Information Security</td>
                    <td>
                        <span class="pill warn">Pending</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Add Student (UI Demo)</h2>
    </div>

    <div class="card">
        <form method="get">
            <div class="form-grid">
                <label class="field ">
                    Student Name
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Email
                    <input type="email" placeholder="" />
                </label>

                <label class="field ">
                    Roll Number
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Department
                    <input type="text" placeholder="" />
                </label>
            </div>

            <p>
                <button class="btn" type="submit">Preview Student</button>
            </p>
        </form>
    </div>
</section>

<?php include "../includes/footer.php"; ?>