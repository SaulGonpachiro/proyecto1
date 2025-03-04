<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM alumnos WHERE correo = :usuario LIMIT 1");
    $stmt->execute(['usuario' => $usuario]);
    $alumno = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($alumno && password_verify($password, $alumno['password'])) {
        $_SESSION['usuario'] = $alumno['id'];
        header("Location: seleccion.html");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>
