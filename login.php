<?php
include 'conexion.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT contrasena FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->bind_result($hash);

if ($stmt->fetch() && password_verify($contrasena, $hash)) {
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location: tienda.php");
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>
