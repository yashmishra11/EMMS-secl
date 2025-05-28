<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Management</title>
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>
    <h1>Equipment List</h1>
    <ul>
        <?php foreach ($equipment as $item): ?>
            <li>
                <?= htmlspecialchars($item['name']) ?> - <?= htmlspecialchars($item['description']) ?>
                <form method="POST" action="/delete.php">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Add New Equipment</h2>
    <form method="POST" action="/create.php">
        <input type="text" name="name" placeholder="Name" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit">Add Equipment</button>
    </form>
</body>
</html>