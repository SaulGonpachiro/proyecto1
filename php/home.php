<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

require 'includes/conexion.php';
$pdo = connection();

$sql = "SELECT * FROM Bocadillo WHERE fecha_baja IS NULL";
$stmt = $pdo->query($sql);
$bocadillos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Bocata</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h2>
    <a href="logout.php">Cerrar sesión</a>

    <?php if ($_SESSION['admin']): ?>
        <p>Eres administrador.</p>
    <?php endif; ?>

    <h3>Lista de Bocadillos</h3>
    <ul>
        <?php foreach ($bocadillos as $bocadillo): ?>
            <li><?php echo $bocadillo['nombre']; ?> - <?php echo $bocadillo['pvp']; ?>€</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
