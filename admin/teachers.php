<?php
$role = 'admin';
$title = 'Manage Teachers';
include '../includes/header.php';
?>

<h1 class='page-title'>Manage Teachers</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Faculty Directory</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Teacher</th>
                    <th>Department</th>
                    <th>Courses</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Dr. Hamza Ali</td>
                    <td>Computer Science</td>
                    <td>3</td>
                    <td>
                        <span class="pill">Active</span>
                    </td>
                </tr>

                <tr>
                    <td>Ms. Hira Malik</td>
                    <td>Computer Science</td>
                    <td>2</td>
                    <td>
                        <span class="pill">Active</span>
                    </td>
                </tr>

                <tr>
                    <td>Mr. Bilal Shah</td>
                    <td>IT</td>
                    <td>2</td>
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
        <h2>Add Teacher (UI Demo)</h2>
    </div>

    <div class="card">
        <form method="get">
            <div class="form-grid">
                <label class="field ">
                    Full Name
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Email
                    <input type="email" placeholder="" />
                </label>

                <label class="field ">
                    Department
                    <input type="text" placeholder="" />
                </label>

                <label class="field ">
                    Employee ID
                    <input type="text" placeholder="" />
                </label>
            </div>

            <p>
                <button class="btn" type="submit">Preview Teacher</button>
            </p>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>