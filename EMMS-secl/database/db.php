<?php
$host = 'localhost';       // Database host (usually localhost for local development)
$dbname = 'emms';          // Name of the database
$username = 'root';        // Database username (default for XAMPP/WAMP is 'root')
$password = '';            // Database password (default for XAMPP/WAMP is empty)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database connection successful!";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>