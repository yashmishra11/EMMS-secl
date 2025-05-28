<?php
require_once __DIR__ . '/../src/controllers/EquipmentController.php';
require_once __DIR__ . '/../database/db.php';

$controller = new EquipmentController($pdo);
$controller->index();
?>