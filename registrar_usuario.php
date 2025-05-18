<?php
include 'conexion.php';

$usuario = $_POST['usuario'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar contraseña

$sql = "INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);

if ($stmt->execute()) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $conn->error;
}
?>