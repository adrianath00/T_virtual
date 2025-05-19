<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit;
}

$carrito = $_SESSION['carrito'] ?? [];
$total = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Carrito de Compras</title>
  <style>
    body { font-family: Arial; padding: 20px; background: #f4f4f4; }
    table { width: 100%; background: #fff; border-collapse: collapse; }
    th, td { padding: 10px; border-bottom: 1px solid #ccc; text-align: center; }
    .btn { background: #d9534f; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; }
    .btn-finalizar { background: #5cb85c; padding: 10px 20px; display: inline-block; color: white; border: none; border-radius: 5px; margin-top: 20px; }
  </style>
</head>
<body>

<h1>Carrito de Compras</h1>

<?php if (empty($carrito)): ?>
  <p>El carrito está vacío.</p>
<?php else: ?>
  <table>
    <tr>
      <th>Producto</th>
      <th>Referencia</th>
      <th>Cantidad</th>
      <th>Precio</th>
      <th>Subtotal</th>
      <th>Acción</th>
    </tr>
    <?php foreach ($carrito as $id => $item): 
      $subtotal = $item['precio'] * $item['cantidad'];
      $total += $subtotal;
    ?>
    <tr>
      <td><?= htmlspecialchars($item['nombre']) ?></td>
      <td><?= $item['referencia'] ?></td>
      <td><?= $item['cantidad'] ?></td>
      <td>$<?= number_format($item['precio'], 2) ?></td>
      <td>$<?= number_format($subtotal, 2) ?></td>
      <td><a class="btn" href="eliminar_carrito.php?id=<?= $id ?>">Eliminar</a></td>
    </tr>
    <?php endforeach; ?>
  </table>

  <h3>Total: $<?= number_format($total, 2) ?></h3>

  <form action="comprar.php" method="POST">
    <button class="btn-finalizar" type="submit">Finalizar Compra</button>
  </form>
<?php endif; ?>

</body>
</html>