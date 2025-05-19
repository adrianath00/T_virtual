<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // mejor redirigir a login.php, no a login.html
    exit();
}

include 'Conexion.php';

$dConnect = new Conexion();
$conn = $dConnect->get_connection();

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h2>
    <a href="logout.php" class="btn btn-danger btn-sm mb-3">Cerrar sesión</a>

    <h3>Catálogo</h3>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['nombre']); ?></h5>
                        <p class="card-text"><?php echo number_format($row['precio'], 2); ?> €</p>
                        <button class="btn btn-primary" disabled>Comprar</button> 
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <a href="catalogo_xml.php" class="btn btn-secondary mt-3">Descargar catálogo en XML</a>

</body>
</html>

<?php
// Cerramos la conexión
$conn->close();
$dConnect->close_connection();
?>
