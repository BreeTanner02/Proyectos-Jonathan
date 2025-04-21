<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Privado</title></head>
<body>
  <h2>Bienvenido <?php echo $_SESSION['usuario']; ?>!</h2>
  <p>Contenido privado 🎉</p>
  <a href="logout.php">Cerrar sesión</a>
</body>
</html>
