<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: 0");
header("Pragma: no-cache");
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    $users = [
        'admin'  => ['password' => 'adminpass', 'role' => 'admin'],
        'viewer' => ['password' => 'viewerpass', 'role' => 'viewer']
    ];
    
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['user'] = [
            'username' => $username,
            'role'     => $users[$username]['role']
        ];
        // Redirect to emms.ct.ws after successful login
        header("Location: http://emms.ct.ws");
        exit;
    } else {
        $error = "Invalid credentials. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Login - Equipment Management</title>
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>
    <div style="margin: 10px;">
        <h1>Login</h1>
        <?php if ($error): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php" class="login-form">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>