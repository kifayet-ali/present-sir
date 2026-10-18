<?php
$role = 'teacher';
$title = 'Quiz Management';
include '../includes/header.php';
?>

<h1 class='page-title'>Quiz Management</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<section class="section">
    <div class="section-head">
        <h2>Quizzes</h2>
        <a class="btn" href="create-quiz.php">+ Create Quiz</a>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Quiz</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Quiz 01: HTML Basics</td>
                    <td>Web Technologies</td>
                    <td>Oct 10</td>
                    <td>
                        <span class="pill">Completed</span>
                    </td>
                </tr>

                <tr>
                    <td>Quiz 02: CSS</td>
                    <td>Web Technologies</td>
                    <td>Oct 12</td>
                    <td>
                        <span class="pill blue">Scheduled</span>
                    </td>
                </tr>

                <tr>
                    <td>Quiz 01: SQL</td>
                    <td>Database Systems</td>
                    <td>Oct 15</td>
                    <td>
                        <span class="pill warn">Draft</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section">
    <div class="section-head">
        <h2>Review Attempts</h2>
    </div>

    <a class="btn secondary" href="quiz-results.php">
        View Results & Activity Logs →
    </a>
</section>

<?php include '../includes/footer.php'; ?>