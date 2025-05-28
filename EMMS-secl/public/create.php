<?php
require_once __DIR__ . '/../src/controllers/EquipmentController.php';
require_once __DIR__ . '/../database/db.php';

$controller = new EquipmentController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $controller->create($name, $description);
}
?>