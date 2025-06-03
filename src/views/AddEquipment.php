<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Equipment</title>
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>
<div style="margin: 10px;">
    <nav class="navbar navbar-left-align">
        <a href="index.php" class="nav-link" style="margin-left: 14px;">Equipment List</a>
        <?php if($_SESSION['user']['role'] === 'admin'): ?>
            <a href="index.php?page=add" class="nav-link" style="margin-left: 14px;">Add Equipment</a>
        <?php endif; ?>
        <a href="index.php?page=about" class="nav-link" style="margin-left: 14px;">About Us</a>
    </nav>
    <h1>Add New Equipment</h1>
    <form method="POST" action="index.php?action=create" class="add-form">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="description" placeholder="Description" required>
        <input type="text" name="status" placeholder="Status" required>
        <input type="number" style="height: 38px;" name="quantity" placeholder="Quantity" min="0" required>
        <input type="date" style="height: 38px;" name="deployment_date" required>
        <button type="submit" style="height: 38px;">Add Equipment</button>
    </form>
</div>
</body>
</html>