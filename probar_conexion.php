<?php
require_once 'Conexion.php';

$conexion = new Conexion();
$conn = $conexion->getConnection();

echo "✅ Conexión exitosa a la base de datos.";
?>
