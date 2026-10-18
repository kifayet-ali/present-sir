
<?php

// Start a secure PHP session
if (session_status() === PHP_SESSION_NONE) {

    ini_set('session.use_strict_mode', '1');

    $https = !empty($_SERVER['HTTPS'])
        && $_SERVER['HTTPS'] !== 'off';

    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $https,
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    session_start();
}

// CSRF token for forms
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(
        random_bytes(32)
    );
}

// Protect admin pages
function requireAdmin() {

    if (
        empty($_SESSION['user_id']) ||
        ($_SESSION['role'] ?? '') !== 'admin'
    ) {
        header('Location: /present-sir/auth/login.php');
        exit;
    }
}


function requireRole($requiredRole) {

    if (
        empty($_SESSION['user_id']) ||
        ($_SESSION['role'] ?? '') !== $requiredRole
    ) {
        header('Location: /present-sir/auth/login.php');
        exit;
    }
}

