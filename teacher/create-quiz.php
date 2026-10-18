<?php
$role = 'teacher';
$title = 'Create New Quiz';
include '../includes/header.php';
?>

<h1 class='page-title'>Create New Quiz</h1>
<p class='subtitle'>
    Manage your learning experience with clarity and confidence.
</p>

<div class="notice">
    Design preview: quiz settings are not stored until a database is connected.
</div>

<div class="card">
    <form method="get">
        <div class="form-grid">
            <label class="field ">
                Quiz Title
                <input type="text" placeholder="e.g. HTML Basics Quiz" />
            </label>

            <label class="field ">
                Course
                <input type="text" placeholder="Web Technologies" />
            </label>

            <label class="field ">
                Start Date & Time
                <input type="datetime-local" placeholder="" />
            </label>

            <label class="field ">
                Duration (minutes)
                <input type="number" placeholder="20" />
            </label>

            <label class="field ">
                Total Marks
                <input type="number" placeholder="20" />
            </label>

            <label class="field ">
                Question Count
                <input type="number" placeholder="10" />
            </label>

            <label class="field wide">
                Question 1
                <input type="text" placeholder="What does HTML stand for?" />
            </label>

            <label class="field ">
                Option A
                <input type="text" placeholder="" />
            </label>

            <label class="field ">
                Option B
                <input type="text" placeholder="" />
            </label>

            <label class="field ">
                Option C
                <input type="text" placeholder="" />
            </label>

            <label class="field ">
                Option D
                <input type="text" placeholder="" />
            </label>

            <label class="field ">
                Correct Option (A/B/C/D)
                <input type="text" placeholder="" />
            </label>
        </div>

        <p>
            <button class="btn" type="submit">Preview Quiz</button>
        </p>
    </form>
</div>

<section class="section">
    <div class="section-head">
        <h2>Assessment Settings</h2>
    </div>

    <div class="card">
        <p>
            <label>
                <input type="checkbox" checked>
                Randomize question order
            </label>
        </p>

        <p>
            <label>
                <input type="checkbox" checked>
                Randomize options
            </label>
        </p>

        <p>
            <label>
                <input type="checkbox" checked>
                Enable anti-cheating warnings
            </label>
        </p>

        <p class="muted">
            These settings are UI placeholders until quiz logic is implemented.
        </p>
    </div>
</section>

<?php include '../includes/footer.php'; ?>