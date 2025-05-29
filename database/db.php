<?php
$host = 'sql211.infinityfree.com';
$dbname = 'if0_39098620_emms_secl';
$username = 'if0_39098620';
$password = 'TMoaFGOe9s';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>