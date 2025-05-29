<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Management</title>
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>

<nav class="navbar">
<a href="index.php" class="nav-link">Home</a>
<a href="index.php?page=add" class="nav-link">Add Equipment</a>
<a href="index.php?page=about" class="nav-link">About</a>
</nav>

<h1>Equipment List</h1>

<div class="equipment-list">
<?php foreach ($equipment as $i => $item): ?>
    <div class="equipment-item">
        <span class="equipment-number"><?= $i + 1 ?>.</span>
        <div class="equipment-details">
            <strong><?= htmlspecialchars($item['name']) ?></strong> - <?= htmlspecialchars($item['description']) ?>
            <br>
            <small>Deployment Date: <?= htmlspecialchars($item['deployment_date']) ?></small>
            <form method="POST" action="index.php?action=delete&id=<?= $item['id'] ?>" style="display:inline;">
                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                <button type="submit" class="delete-btn">Delete</button>
            </form>
            <a href="index.php?action=edit&id=<?= $item['id'] ?>" class="edit-btn" style="margin-left:8px;">Edit</a>
        </div>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>