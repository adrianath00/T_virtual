<?php
session_start();
include 'Conexion.php';

// Verificar que los datos fueron enviados por POST
if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Mostrar para depuración (puedes quitar esto después)
    echo ($usuario);
    echo ($contrasena);

    $dConnect = new Conexion;

    // Buscar usuario específico
    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $dConnect->get_connection()->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($contrasena, $row['contrasena'])) {
            $_SESSION['usuario'] = $usuario;
            header("Location: tienda.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
} else {
    echo "Faltan datos de usuario o contraseña.";
}
?>
