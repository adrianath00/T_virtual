<?php
session_start();
require_once 'Conexion.php';

if (!isset($_SESSION['usuario']) || empty($_SESSION['carrito'])) {
    header("Location: carrito.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$carrito = $_SESSION['carrito'];

$db = new Conexion();
$conn = $db->conn;

// Registrar cada producto comprado
foreach ($carrito as $id => $item) {
    $cantidad = $item['cantidad'];

    $stmt = $conn->prepare("INSERT INTO compras (usuario, producto_id, cantidad) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $usuario, $id, $cantidad);
    $stmt->execute();
    $stmt->close();
}

// Vaciar el carrito
unset($_SESSION['carrito']);

// Redirigir con mensaje de éxito
header("Location: catalogo.php?mensaje=compra_realizada");
exit;