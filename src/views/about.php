<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>
<div style="margin: 10px;">
<nav class="navbar">
    <div class="navbar-left">
        <a href="index.php" class="nav-link">Equipment List</a>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
            <a href="index.php?page=add" class="nav-link">Add Equipment</a>
        <?php endif; ?>
        <a href="index.php?page=about" class="nav-link">About Us</a>
    </div>
</nav>
<h1>About Us</h1><br>
<p style="margin-left: 40px; margin-right: 40px;">
    <strong style="font-size: large">Equipment Management & Monitoring System (EMMS) is a web-based application designed to help you efficiently manage and monitor your equipment inventory.</strong><br><br>

<p style="margin-left: 40px; margin-right: 40px;">
    For questions, support, or feedback, please contact the <strong>Developer :</strong>
    <strong>Email :</strong> <a href="yaash1102@outlook.com">yaash1102@outlook.com</a>
    <strong>Phone :</strong> +91 8827895934
</p>
</div>
</body>
</html>