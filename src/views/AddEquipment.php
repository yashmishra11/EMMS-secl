<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Equipment</title>
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="nav-link">Home</a>
    <a href="index.php?page=add" class="nav-link">Add Equipment</a>
    <a href="index.php?page=about" class="nav-link">About</a>
</nav>
<h1>Add New Equipment</h1>
<form method="POST" action="index.php?action=create" class="add-form">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="date" name="deployment_date" required>
    <button type="submit">Add Equipment</button>
</form>
</body>
</html>