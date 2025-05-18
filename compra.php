<?php
session_start();
include 'conexion.php';

$usuario = $_SESSION['usuario'];
$referencia = $_POST['referencia'];

$sql = "INSERT INTO compras (usuario, referencia) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $usuario, $referencia);

if ($stmt->execute()) {
    echo "Compra realizada con éxito.";
} else {
    echo "Error al comprar.";
}
?>
