<?php
$role = 'student';
$title = 'Quiz Result';
include '../includes/header.php';

$answer = $_GET['q1'] ?? '';
$correct = $answer === 'a';
?>

<h1 class="page-title">Quiz Result — Demo</h1>
<p class="subtitle">
    This page evaluates one example answer using simple PHP, without a database.
</p>

<div class="grid">
    <div class="card stat">
        <div class="caption">Sample Question Score</div>
        <div class="value"><?= $correct ? '1 / 1' : '0 / 1' ?></div>
        <span class="pill <?= $correct ? '' : 'warn' ?>">
            <?= $correct ? 'Correct' : 'Incorrect / Not Answered' ?>
        </span>
    </div>

    <div class="card stat">
        <div class="caption">Submission Type</div>
        <div class="value" style="font-size:22px">Manual</div>
        <span class="pill blue">Demo</span>
    </div>
</div>

<section class="section">
    <div class="card">
        <h3>Correct Answer</h3>
        <p>Hyper Text Markup Language</p>
        <p class="muted">
            No score is saved. Full timed quiz functionality requires additional development.
        </p>
        <a class="btn secondary" href="waiting.php">Back to Quiz</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>