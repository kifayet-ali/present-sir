<?php
$role = 'student';
$title = 'Quiz Instructions & Waiting Room';
include '../includes/header.php';
?>

<h1 class='page-title'>Quiz Instructions &amp; Waiting Room</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<div class="card">
    <span class="pill blue">Scheduled Quiz</span>
    <h2>Web Technologies — HTML Basics</h2>
    <p class="muted">20 questions · 20 minutes · 20 marks</p>

    <div class="notice warn">
        The scheduled quiz lock and countdown will become functional when JavaScript and backend validation are added.
    </div>

    <p>
        Instructions: read each question carefully, choose one answer, and submit before the deadline.
    </p>

    <a class="btn" href="attempt.php">Open Demo Quiz →</a>
</div>

<?php include '../includes/footer.php'; ?>