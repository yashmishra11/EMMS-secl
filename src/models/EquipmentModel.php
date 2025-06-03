<?php
require_once __DIR__ . '/../../database/db.php';

class EquipmentModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllEquipment() {
        $stmt = $this->pdo->query("SELECT * FROM equipment");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function searchEquipment($search, $tag = 'name') {
    $allowed = ['all', 'name', 'quantity', 'deployment_date'];
    if (!in_array($tag, $allowed)) $tag = 'name';
    if ($tag === 'all') {
        $sql = "SELECT * FROM equipment WHERE name LIKE ? OR description LIKE ? OR quantity LIKE ? OR deployment_date LIKE ?";
        $param = '%' . $search . '%';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$param, $param, $param, $param]);
    } elseif ($tag === 'quantity') {
        $sql = "SELECT * FROM equipment WHERE quantity = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$search]);
    } else {
        $sql = "SELECT * FROM equipment WHERE $tag LIKE ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['%' . $search . '%']);
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function getEquipmentById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM equipment WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEquipment($name, $description, $quantity, $deployment_date) {
        $stmt = $this->pdo->prepare("INSERT INTO equipment (name, description, quantity, deployment_date) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $quantity, $deployment_date]);
    }

    public function updateEquipment($id, $name, $description, $quantity, $deployment_date) {
        $stmt = $this->pdo->prepare("UPDATE equipment SET name = ?, description = ?, quantity = ?, deployment_date = ? WHERE id = ?");
        $stmt->execute([$name, $description, $quantity, $deployment_date, $id]);
    }
    public function deleteEquipment($id) {
        $stmt = $this->pdo->prepare("DELETE FROM equipment WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>