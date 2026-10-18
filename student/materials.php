<?php
$role = 'student';
$title = 'Learning Resources';
include '../includes/header.php';
?>

<h1 class='page-title'>Learning Resources</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Course Materials</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Resource</th>
                    <th>Course</th>
                    <th>Type</th>
                    <th>Access</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>HTML & CSS Notes</td>
                    <td>Web Technologies</td>
                    <td>PDF</td>
                    <td>Available after upload integration</td>
                </tr>

                <tr>
                    <td>Database Fundamentals</td>
                    <td>Database Systems</td>
                    <td>Slides</td>
                    <td>Available after upload integration</td>
                </tr>

                <tr>
                    <td>Security Checklist</td>
                    <td>Information Security</td>
                    <td>PDF</td>
                    <td>Available after upload integration</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<?php include '../includes/footer.php'; ?>