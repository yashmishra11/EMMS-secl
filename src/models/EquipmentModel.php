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

    // Fetch a single equipment record by ID
    public function getEquipmentById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM equipment WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insert a new equipment record
    public function createEquipment($name, $description, $deployment_date) {
        $stmt = $this->pdo->prepare("INSERT INTO equipment (name, description, deployment_date) VALUES (?, ?, ?)");
        $stmt->execute([$name, $description, $deployment_date]);
    }

    // Update an equipment record
    public function updateEquipment($id, $name, $description, $deployment_date) {
        $stmt = $this->pdo->prepare("UPDATE equipment SET name = ?, description = ?, deployment_date = ? WHERE id = ?");
        $stmt->execute([$name, $description, $deployment_date, $id]);
    }

    // Delete an equipment record
    public function deleteEquipment($id) {
        $stmt = $this->pdo->prepare("DELETE FROM equipment WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>