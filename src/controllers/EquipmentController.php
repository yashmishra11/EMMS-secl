<?php
require_once __DIR__ . '/../models/EquipmentModel.php';

class EquipmentController {
    private $model;

    public function __construct($pdo) {
        $this->model = new EquipmentModel($pdo);
    }

    // Display all equipment
    public function index() {
        $equipment = $this->model->getAllEquipment();
        include __DIR__ . '/../views/equipment.php';
    }

    // Show the edit form
    public function edit($id) {
        $equipment = $this->model->getEquipmentById($id);
        include __DIR__ . '/../views/edit_equipment.php';
    }

    // Handle creating new equipment
    public function create($name, $description, $deployment_date) {
        $this->model->createEquipment($name, $description, $deployment_date);
        header("Location: index.php");
        exit;
    }

    // Handle updating equipment
    public function update($id, $name, $description, $deployment_date) {
        $this->model->updateEquipment($id, $name, $description, $deployment_date);
        header("Location: index.php");
        exit;
    }

    // Handle deleting equipment
    public function delete($id) {
        $this->model->deleteEquipment($id);
        header("Location: index.php");
        exit;
    }
}
?>