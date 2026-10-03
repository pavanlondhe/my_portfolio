<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../includes/auth.php';

redirectIfLoggedIn();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim((string) ($_POST['email'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    if (verifyAdminLogin($email, $password)) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $email;
        header('Location: /professional-portfolio/admin/dashboard.php');
        exit();
    }

    $message = 'Invalid email or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Pavan Londhe</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background: #f4f7fb; }
        .login-shell { min-height: 100vh; display: grid; place-items: center; padding: 2rem; }
        .login-box { width: min(480px, 100%); background: white; border: 1px solid var(--border); border-radius: 24px; box-shadow: var(--shadow); padding: 2rem; }
        .login-box h1 { margin-bottom: 0.8rem; }
        .login-form { display: grid; gap: 1rem; }
        .login-form input { width: 100%; padding: 0.8rem 0.9rem; border-radius: 12px; border: 1px solid var(--border); }
        .login-meta { font-size: 0.85rem; color: var(--muted); }
    </style>
</head>
<body>
    <div class="login-shell">
        <div class="login-box">
            <p class="eyebrow dark">Admin Access</p>
            <h1>Login</h1>
            <p class="login-meta">Default credentials: admin@pavanportfolio.local / admin123</p>

            <?php if ($message): ?>
                <p class="form-status error"><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>

            <form class="login-form" method="post">
                <div class="field-group">
                    <label for="email">Email / Username</label>
                    <input id="email" name="email" type="email" value="admin@pavanportfolio.local" required>
                </div>

                <div class="field-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter password" required>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
