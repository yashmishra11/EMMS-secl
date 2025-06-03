<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Management</title>
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
        <?php if(isset($_SESSION['user'])): ?>
            <a href="logout.php" class="nav-link">Sign Out</a>
        <?php endif; ?>
    </div>
    <form method="GET" action="index.php" class="add-form navbar-search">
        <select name="tag" style="height: 19px; width: 70px;">
            <option value="all" <?= (isset($_GET['tag']) && $_GET['tag'] === 'all') ? 'selected' : '' ?>>All</option>
            <option value="name" <?= (isset($_GET['tag']) && $_GET['tag'] === 'name') ? 'selected' : '' ?>>Name</option>
            <option value="quantity" <?= (isset($_GET['tag']) && $_GET['tag'] === 'quantity') ? 'selected' : '' ?>>Quantity</option>
            <option value="deployment_date" <?= (isset($_GET['tag']) && $_GET['tag'] === 'deployment_date') ? 'selected' : '' ?>>Date</option>
        </select>
        <input type="text" style="height: 6px; width: 150px;" name="search" placeholder="Search..." 
               value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit">Search</button>
    </form>
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
            <br>
            <small>Status: <?= htmlspecialchars($item['status']) ?></small>
            <br>
            <small>Quantity: <?= htmlspecialchars($item['quantity']) ?></small>
            <br>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                <form method="POST" action="index.php?action=delete&id=<?= $item['id'] ?>" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
                <a href="index.php?action=edit&id=<?= $item['id'] ?>" class="edit-btn" style="margin-left:8px;">Edit</a>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
</div>

<a href="#" id="back-to-top" style="display:none;position:fixed;bottom:32px;right:32px;z-index:1000;background:#4a90e2;color:#fff;padding:11px 21px;border-radius:50%;font-size:1.5rem;text-align:center;box-shadow:0 7px 10px rgba(0,0,0,0.15);text-decoration:none;transition:background 0.2s;">&#8679;</a>
<script src="/public/js/app.js"></script>
<script>
    window.addEventListener('scroll', function() {
        const btn = document.getElementById('back-to-top');
        btn.style.display = window.scrollY > 200 ? 'block' : 'none';
    });
    document.getElementById('back-to-top').addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
</div>
</body>
</html>