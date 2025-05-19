<?php
session_start();
require_once 'Conexion.php';

error_reporting(E_ALL & ~E_NOTICE);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Solo para debug: ver qué se está enviando
    // echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

    $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($usuario) || empty($password)) {
        die("Por favor, completa todos los campos.");
    }

    $conexion = new Conexion();
    $conn = $conexion->getConnection();

    $stmt = $conn->prepare("SELECT password FROM usuarios WHERE usuario = ?");
    if (!$stmt) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hash);
        $stmt->fetch();

        if (password_verify($password, $hash)) {
            $_SESSION['usuario'] = $usuario;
            header("Location: catalogo.php");
            exit;
        } else {
            die("Contraseña incorrecta.");
        }
    } else {
        die("Usuario no encontrado.");
    }

    $stmt->close();
    $conn->close();
} else {
    die("Acceso no permitido.");
}
