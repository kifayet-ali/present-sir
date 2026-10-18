
<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/db.php';

requireAdmin();

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!hash_equals(
        $_SESSION['csrf_token'],
        $_POST['csrf_token'] ?? ''
    )) {
        http_response_code(403);
        exit('Invalid request.');
    }

    $name = trim($_POST['full_name'] ?? '');
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';
    $regNo = trim($_POST['registration_no'] ?? '');

    // Only these roles can be created here
    $allowedRoles = ['teacher', 'student'];

    if (
        $name === '' ||
        strlen($name) > 100 ||
        !filter_var($email, FILTER_VALIDATE_EMAIL) ||
        strlen($email) > 150 ||
        strlen($password) < 12 ||
        !in_array($role, $allowedRoles, true) ||
        strlen($regNo) > 30 ||
        ($role === 'student' && $regNo === '')
    ) {
        $error = 'Please enter valid details. Password must have at least 12 characters.';
    } else {

        try {
            $hash = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $stmt = $pdo->prepare(
                "INSERT INTO users
                (full_name, registration_no, email, password_hash, role)
                VALUES (?, ?, ?, ?, ?)"
            );

            $stmt->execute([
                $name,
                $regNo === '' ? null : $regNo,
                $email,
                $hash,
                $role
            ]);

            $message = ucfirst($role) .
                ' account created successfully!';

        } catch (PDOException $e) {

            if ($e->getCode() === '23000') {
                $error = 'Email or registration number already exists.';
            } else {
                error_log($e->getMessage());
                $error = 'Unable to create account.';
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Create User | Present Sir</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">
</head>

<body>

<div class="auth-wrap">

    <div class="auth-left">
        <div class="brand">
            Present<span>Sir.</span>
        </div>

        <h1>Create User Account</h1>
        <p>
            Add Teachers and Students to the RCET system.
        </p>
    </div>

    <div class="auth-right">
        <div class="auth-card">

            <h2>New Account</h2>

            <?php if ($message): ?>
                <div class="notice">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="notice warn">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <input type="hidden"
                       name="csrf_token"
                       value="<?= htmlspecialchars(
                           $_SESSION['csrf_token']
                       ) ?>">

                <input type="text"
                       name="full_name"
                       placeholder="Full Name"
                       maxlength="100"
                       required>

                <input type="email"
                       name="email"
                       placeholder="Email Address"
                       required>

                <input type="text"
                       name="registration_no"
                       placeholder="Student Registration No. (for students)">

                <select name="role" required>
                    <option value="">Select Role</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>

                <input type="password"
                       name="password"
                       placeholder="Password (minimum 12 characters)"
                       minlength="12"
                       autocomplete="new-password"
                       required>

                <button type="submit" class="btn">
                    Create Account
                </button>

            </form>

            <p class="helper">
                <a href="dashboard.php">
                    Back to Dashboard
                </a>
            </p>

        </div>
    </div>
</div>

</body>
</html>
