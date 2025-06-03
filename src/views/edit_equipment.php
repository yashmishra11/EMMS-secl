<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Equipment</title>
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
<h1>Edit Equipment</h1>
<form method="POST" action="index.php?action=update&id=<?= $equipment['id'] ?>" class="add-form">
    <input type="text" name="name" value="<?= htmlspecialchars($equipment['name']) ?>" required>
    <input type="text" name="description" value="<?= htmlspecialchars($equipment['description']) ?>" required>
    <input type="text" name="status" value="<?= htmlspecialchars($equipment['status']) ?>" required>
    <input type="number" name="quantity" value="<?= htmlspecialchars($equipment['quantity']) ?>" min="0" required>
    <input type="date" name="deployment_date" value="<?= htmlspecialchars($equipment['deployment_date']) ?>" required>
    <button type="submit">Update Equipment</button>
  
</form>
</div>
</body>
</html>