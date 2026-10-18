<?php
$role = 'student';
$title = 'Live Quiz — UI Preview';
include '../includes/header.php';
?>

<h1 class='page-title'>Live Quiz — UI Preview</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<div class="notice warn">
    UI preview only: no live timer, automatic submission or tab monitoring is active.
</div>

<div class="card">
    <div class="flex" style="justify-content:space-between">
        <span class="pill blue">Question 1 of 5</span>
        <span class="pill warn">Timer: demo only</span>
    </div>

    <p class="question">What does HTML stand for?</p>

    <form action="result.php" method="get">
        <label class="option">
            <input type="radio" name="q1" value="a">
            Hyper Text Markup Language
        </label>

        <label class="option">
            <input type="radio" name="q1" value="b">
            High Text Machine Language
        </label>

        <label class="option">
            <input type="radio" name="q1" value="c">
            Hyperlink Transfer Mode
        </label>

        <label class="option">
            <input type="radio" name="q1" value="d">
            Home Tool Markup Language
        </label>

        <p>
            <button class="btn" type="submit">Submit Demo Answer →</button>
        </p>
    </form>
</div>

<?php include '../includes/footer.php'; ?>