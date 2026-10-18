<?php
$role = $role ?? 'teacher';
$title = $title ?? 'Dashboard';
$base = ($role === 'quiz') ? '../' : '../';

$menus = [
    'admin' => [
        ['Dashboard', 'dashboard.php'],
        ['Teachers', 'teachers.php'],
        ['Students', 'students.php'],
        ['Courses', 'courses.php'],
        ['Enrollments', 'enrollments.php']
    ],
    'teacher' => [
        ['Dashboard', 'dashboard.php'],
        ['My Courses', 'courses.php'],
        ['Course Details', 'course-details.php'],
        ['Attendance', 'attendance.php'],
        ['Gradebook', 'marks.php'],
        ['Assignments', 'assignments.php'],
        ['Materials', 'materials.php'],
        ['Quizzes', 'quizzes.php'],
        ['Create Quiz', 'create-quiz.php'],
        ['Quiz Results', 'quiz-results.php']
    ],
    'student' => [
        ['Dashboard', 'dashboard.php'],
        ['My Courses', 'courses.php'],
        ['Attendance & Marks', 'attendance.php'],
        ['Assignments', 'assignments.php'],
        ['Materials', 'materials.php'],
        ['My Results', 'results.php'],
        ['Take Quiz', '../quiz/waiting.php']
    ]
];

$menu = $menus[$role] ?? $menus['student'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= htmlspecialchars($title) ?> | Present Sir</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="brand">Present<span>Sir.</span></div>
            <div class="side-label"><?= ucfirst($role) ?> workspace</div>

            <nav>
                <?php foreach ($menu as $m): ?>
                    <a
                        class="nav-link <?= basename($_SERVER['PHP_SELF']) === basename($m[1]) ? 'active' : '' ?>"
                        href="<?= htmlspecialchars($m[1]) ?>"
                    >
                        <?= htmlspecialchars($m[0]) ?>
                    </a>
                <?php endforeach; ?>

                
<!-- Sidebar Logout Button -->
<form
    action="/present-sir/auth/logout.php"
    method="POST"
    class="sidebar-logout-form"
>
    <input
        type="hidden"
        name="csrf_token"
        value="<?= htmlspecialchars(
            $_SESSION['csrf_token'],
            ENT_QUOTES,
            'UTF-8'
        ) ?>"
    >

    <button type="submit" class="sidebar-logout-btn">
        <span class="logout-symbol" aria-hidden="true">↪</span>
        <span>Logout</span>
    </button>
</form>

            </nav>
        </aside>

        <div class="main">
            <header class="topbar">
                <div>
                    <span class="eyebrow">Present Sir / <?= ucfirst($role) ?></span>
                    <strong><?= htmlspecialchars($title) ?></strong>
                </div>

                <div class="avatar"><?= strtoupper(substr($role, 0, 1)) ?></div>
            </header>

            <main class="content">