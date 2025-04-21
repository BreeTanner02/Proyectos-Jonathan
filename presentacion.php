<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
    <style>
        body { display: flex; margin: 0; font-family: Arial, sans-serif; }
        nav { width: 400px; background: #007BFF; color: #fff; padding: 15px; }
        nav h2 { text-align: center; margin-bottom: 20px; }
        nav a { display: block; color: #fff; text-decoration: none; margin: 10px 0; padding: 10px; border-radius: 5px; }
        nav a:hover { background: #0056b3; }
        iframe { flex-grow: 2; border: 1; height: 100vh; }
    </style>
</head>
<body>
    <nav>
        <h2>Proyectos</h2>
        <a href="pdfs/documento1.pdf" target="contentFrame">Comandos Basicos</a>
        <a href="pdfs/documento2.pdf" target="contentFrame">Tutorial Samba y NTFS</a>
        <a href="pdfs/documento3.pdf" target="contentFrame">Tutorial basico Postinstalación</a>
    </nav>
    <iframe name="contentFrame"></iframe>
</body>
</html>
