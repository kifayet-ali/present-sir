
<?php
// Start session through the shared auth file
require_once __DIR__ . '/../includes/auth.php';

// Login error messages
$error = '';

if (isset($_GET['error'])) {
    if ($_GET['error'] === 'locked') {
        $error = 'Too many login attempts. Please try again in 5 minutes.';
    } elseif ($_GET['error'] === 'invalid') {
        $error = 'Invalid email or password. Please try again.';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Login | Present Sir</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body>

<div class="auth-wrap">

    <!-- LEFT SIDE: BRANDING -->
    <div class="auth-left">

        <div class="brand">
            Present<span>Sir.</span>
        </div>

        <h1>
            Welcome back to smarter learning.
        </h1>

        <p>
            One calm workspace for your courses,
            assessments and academic progress.
        </p>

    </div>


    <!-- RIGHT SIDE: LOGIN FORM -->
    <div class="auth-right">

        <div class="auth-card">

            <h2>Sign in</h2>

            <p class="muted">
                Enter your account email and password
                to access your dashboard.
            </p>


            <!-- ERROR MESSAGE -->
            <?php if ($error !== ''): ?>

                <div class="notice warn" role="alert">

                    <?= htmlspecialchars(
                        $error,
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>

                </div>

            <?php endif; ?>


            <!-- REAL DATABASE LOGIN FORM -->
            <form action="login-handler.php"
                  method="POST">

                <!-- EMAIL -->
                <input
                    type="email"
                    name="email"
                    placeholder="Email Address"
                    autocomplete="username"
                    required
                >

                <!-- PASSWORD -->
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    autocomplete="current-password"
                    required
                >

                <!-- CSRF SECURITY TOKEN -->
                <input
                    type="hidden"
                    name="csrf_token"
                    value="<?= htmlspecialchars(
                        $_SESSION['csrf_token'],
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>"
                >

                <!-- LOGIN BUTTON -->
                <button type="submit" class="btn">
                    Login
                </button>

            </form>


            <!-- ADDITIONAL LINKS -->
            <p class="helper">

                <a href="register.php">
                    Create account
                </a>

                &middot;

                <a href="forgot-password.php">
                    Forgot password?
                </a>

            </p>

        </div>

    </div>

</div>

</body>
</html>
