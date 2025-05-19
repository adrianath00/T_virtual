<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

unset($_SESSION['carrito']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Compra Finalizada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Compra Finalizada</h2>
    <p>¡Gracias por su compra!</p>
    <a href="catalogo.php" class="btn btn-primary">Volver al catálogo</a>
</body>
</html>
