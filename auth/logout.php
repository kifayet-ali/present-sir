
<?php
require_once __DIR__ . '/../includes/auth.php';

// Sirf POST request allow karo
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed.');
}

// Form security check
if (!hash_equals(
    $_SESSION['csrf_token'],
    $_POST['csrf_token'] ?? ''
)) {
    exit('Invalid request.');
}

// Login information clear karo
$_SESSION = [];

// Session cookie remove karo
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();

    setcookie(session_name(), '', [
        'expires' => time() - 42000,
        'path' => $params['path'],
        'domain' => $params['domain'],
        'secure' => $params['secure'],
        'httponly' => $params['httponly'],
        'samesite' => $params['samesite']
    ]);
}

// Session destroy
session_destroy();

// Login page par redirect
header('Location: /present-sir/auth/login.php');
exit;
?>
