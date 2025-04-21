<?php
$host = "localhost";      // Servidor (generalmente localhost)
$user = "root";           // Usuario (en XAMPP por defecto es root)
$pass = "";               // Contraseña (en XAMPP por defecto es vacía)
$db = "usuariosDB";       // Nombre de la base de datos

// Crear conexión
$conexion = new mysqli($host, $user, $pass, $db);

// Verificar si hubo error
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
