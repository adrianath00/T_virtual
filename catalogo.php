session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

// Inicializar carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Agregar producto al carrito cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comprar'])) {
    $id = $_POST['producto_id'];
    $nombre = $_POST['producto_nombre'];
    $precio = floatval($_POST['producto_precio']);

    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad'] += 1;
    } else {
        $_SESSION['carrito'][$id] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => 1
        ];
    }

    // Redirigir para evitar reenvío del formulario
    header("Location: catalogo.php");
    exit();
}
