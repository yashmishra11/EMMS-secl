<?php
require_once __DIR__ . '/../models/EquipmentModel.php';

class EquipmentController {
    private $model;

    public function __construct($pdo) {
        $this->model = new EquipmentModel($pdo);
    }

    public function index($search = null, $tag = 'name') {
        if ($search) {
            $equipment = $this->model->searchEquipment($search, $tag);
        } else {
            $equipment = $this->model->getAllEquipment();
        }
        include __DIR__ . '/../views/equipment.php';
    }

    public function edit($id) {
        $equipment = $this->model->getEquipmentById($id);
        include __DIR__ . '/../views/edit_equipment.php';
    }

    public function create($name, $description, $quantity, $deployment_date) {
        $this->model->createEquipment($name, $description, $quantity, $deployment_date);
        header("Location: index.php");
        exit;
    }

    public function update($id, $name, $description, $quantity, $deployment_date) {
        $this->model->updateEquipment($id, $name, $description, $quantity, $deployment_date);
        header("Location: index.php");
        exit;
    }

    public function delete($id) {
        $this->model->deleteEquipment($id);
        header("Location: index.php");
        exit;
    }
}
?>