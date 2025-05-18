<?php
require 'includes/Conexion.php';

header("Content-Type: text/xml");
header("Content-Disposition: attachment; filename=catalogo.xml");

// Consultar productos
$stmt = $pdo->query("SELECT referencia, nombre, precio FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear estructura XML
$xml = new DOMDocument("1.0", "UTF-8");
$xml->formatOutput = true;

$root = $xml->createElement("catalogo");
$xml->appendChild($root);

foreach ($productos as $producto) {
    $productoNode = $xml->createElement("producto");

    $ref = $xml->createElement("referencia", $producto['referencia']);
    $nombre = $xml->createElement("nombre", $producto['nombre']);
    $precio = $xml->createElement("precio", $producto['precio']);

    $productoNode->appendChild($ref);
    $productoNode->appendChild($nombre);
    $productoNode->appendChild($precio);

    $root->appendChild($productoNode);
}

// Mostrar o descargar XML
echo $xml->saveXML();
?>
