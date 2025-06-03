<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: src/views/login.php");
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/src/controllers/EquipmentController.php';
require_once __DIR__ . '/database/db.php';

$controller = new EquipmentController($pdo);

$page   = $_GET['page'] ?? null;
$action = $_GET['action'] ?? null;
$search = $_GET['search'] ?? null;
$tag    = $_GET['tag'] ?? 'name';

if (isset($_SESSION['user']) && $_SESSION['user']['role'] !== 'admin' && in_array($action, ['delete', 'create', 'edit', 'update'])) {
    header("Location: index.php");
    exit;
}

if ($action === 'delete' && isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->delete($_GET['id']);
} elseif ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $controller->create(
        $_POST['name'],
        $_POST['description'],
        $_POST['quantity'],
        $_POST['deployment_date'],
        $_POST['status']
    );
} elseif ($action === 'edit' && isset($_GET['id'])) {
    $controller->edit($_GET['id']);
} elseif ($action === 'update' && isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update(
        $_GET['id'],
        $_POST['name'],
        $_POST['description'],
        $_POST['quantity'],
        $_POST['deployment_date'],
        $_POST['status']
    );
} elseif ($page === 'add') {
    include __DIR__ . '/src/views/AddEquipment.php';
} elseif ($page === 'about') {
    include __DIR__ . '/src/views/about.php';
} else {
    $controller->index($search, $tag);
}
?>