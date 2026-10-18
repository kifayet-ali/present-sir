<?php
$role = 'teacher';
$title = 'Quiz Results & Activity Logs';
include '../includes/header.php';
?>

<h1 class='page-title'>Quiz Results &amp; Activity Logs</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<div class="grid">
    <div class="card stat">
        <div class="caption">Attempts</div>
        <div class="value">32</div>
        <span class="pill ">Recorded</span>
    </div>

    <div class="card stat">
        <div class="caption">Average Score</div>
        <div class="value">16/20</div>
        <span class="pill blue">Class average</span>
    </div>

    <div class="card stat">
        <div class="caption">Auto-submitted</div>
        <div class="value">04</div>
        <span class="pill warn">Timeout</span>
    </div>

    <div class="card stat">
        <div class="caption">Flagged Activity</div>
        <div class="value">03</div>
        <span class="pill warn">Review</span>
    </div>
</div>

<section class="section">
    <div class="section-head">
        <h2>Student Quiz Results</h2>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Score</th>
                    <th>Submission</th>
                    <th>Tab Switches</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Ayesha Khan</td>
                    <td>18/20</td>
                    <td>Manual</td>
                    <td>0</td>
                    <td>
                        <span class="pill">Clear</span>
                    </td>
                </tr>

                <tr>
                    <td>Ali Raza</td>
                    <td>15/20</td>
                    <td>Auto</td>
                    <td>2</td>
                    <td>
                        <span class="pill warn">Review</span>
                    </td>
                </tr>

                <tr>
                    <td>Sara Ahmed</td>
                    <td>19/20</td>
                    <td>Manual</td>
                    <td>0</td>
                    <td>
                        <span class="pill">Clear</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<p class="muted">
    Illustrative data only. Browser activity cannot be detected with PHP and CSS alone.
</p>

<?php include '../includes/footer.php'; ?>