<?php
session_start();

$conexion = new mysqli("localhost", "root", "", "usuariosDB");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();

    if ($password === $usuario['password']) {
        $_SESSION['usuario'] = $username;
        header("Location: privado.php");
        exit;
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}
?>
