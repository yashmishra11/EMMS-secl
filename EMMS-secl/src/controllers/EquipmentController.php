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

    // Handle creating new equipment
    public function create($name, $description) {
        $this->model->createEquipment($name, $description);
        header("Location: /");
    }

    // Handle updating equipment
    public function update($id, $name, $description) {
        $this->model->updateEquipment($id, $name, $description);
        header("Location: /");
    }

    // Handle deleting equipment
    public function delete($id) {
        $this->model->deleteEquipment($id);
        header("Location: /");
    }
}
?>