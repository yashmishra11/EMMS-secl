<?php
require_once __DIR__ . '/../../database/db.php';

class EquipmentModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Fetch all equipment records
    public function getAllEquipment() {
        $stmt = $this->pdo->query("SELECT * FROM equipment");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insert a new equipment record
    public function createEquipment($name, $description) {
        $stmt = $this->pdo->prepare("INSERT INTO equipment (name, description) VALUES (?, ?)");
        $stmt->execute([$name, $description]);
    }

    // Update an equipment record
    public function updateEquipment($id, $name, $description) {
        $stmt = $this->pdo->prepare("UPDATE equipment SET name = ?, description = ? WHERE id = ?");
        $stmt->execute([$name, $description, $id]);
    }

    // Delete an equipment record
    public function deleteEquipment($id) {
        $stmt = $this->pdo->prepare("DELETE FROM equipment WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>