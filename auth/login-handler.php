
<?php

require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';

// Only POST requests allowed
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed.');
}

// CSRF protection
if (!hash_equals(
    $_SESSION['csrf_token'] ?? '',
    $_POST['csrf_token'] ?? ''
)) {
    http_response_code(403);
    exit('Invalid request.');
}

// Check temporary login lock
if (time() < ($_SESSION['lock_until'] ?? 0)) {
    header('Location: login.php?error=locked');
    exit;
}

// Get login details
$email = strtolower(trim($_POST['email'] ?? ''));
$password = $_POST['password'] ?? '';

// Find user
$stmt = $pdo->prepare(
    "SELECT user_id, full_name, email, password_hash, role
     FROM users
     WHERE email = ?
     LIMIT 1"
);

$stmt->execute([$email]);
$user = $stmt->fetch();

// Verify password
if (
    !$user ||
    !password_verify($password, $user['password_hash'])
) {

    $_SESSION['login_failures'] =
        ($_SESSION['login_failures'] ?? 0) + 1;

    if ($_SESSION['login_failures'] >= 5) {
        $_SESSION['lock_until'] = time() + 300;
        $_SESSION['login_failures'] = 0;
    }

    header('Location: login.php?error=invalid');
    exit;
}

// Allowed dashboard routes
$dashboards = [
    'admin' => '/present-sir/admin/dashboard.php',
    'teacher' => '/present-sir/teacher/dashboard.php',
    'student' => '/present-sir/student/dashboard.php'
];

if (!isset($dashboards[$user['role']])) {
    header('Location: login.php?error=invalid');
    exit;
}

// Secure session
session_regenerate_id(true);

// Save user session
$_SESSION['user_id'] = $user['user_id'];
$_SESSION['full_name'] = $user['full_name'];
$_SESSION['role'] = $user['role'];

unset(
    $_SESSION['login_failures'],
    $_SESSION['lock_until']
);

// Redirect according to role
header('Location: ' . $dashboards[$user['role']]);
exit;
