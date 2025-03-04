<?php
require 'includes/conexion.php';

$pdo = connection();
$sql = "SELECT * FROM Bocadillo WHERE fecha_baja IS NULL";
$stmt = $pdo->query($sql);
$bocadillos = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($bocadillos);
?>
