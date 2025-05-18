<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}
include 'Conexion.php';
$result = $conn->query("SELECT * FROM productos");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tienda</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>
  <h2>Productos disponibles</h2>
  <ul>
    <?php while ($row = $result->fetch_assoc()): ?>
      <li>
        <?php echo $row['nombre'] . " - $" . $row['precio']; ?>
        <form action="comprar.php" method="POST" style="display:inline;">
          <input type="hidden" name="referencia" value="<?php echo $row['referencia']; ?>">
          <button type="submit">Comprar</button>
        </form>
      </li>
    <?php endwhile; ?>
  </ul>
</body>
</html>