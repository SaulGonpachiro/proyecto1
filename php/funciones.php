<?php
require_once 'conexion.php';

function verificarUsuario($email, $password) {
    $pdo = connection();
    $sql = "SELECT * FROM Usuario WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['PASSWORD'])) {
        return $usuario;
    }
    return false;
}
?>
