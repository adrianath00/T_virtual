<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio - Proyecto Final</title>
  <link rel="stylesheet" href="estilos.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f2f5;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    header {
      background-color: #003366;
      color: white;
      padding: 20px 0;
      width: 100%;
      text-align: center;
    }

    main {
      margin-top: 50px;
      text-align: center;
    }

    .botones a {
      display: inline-block;
      margin: 10px;
      padding: 12px 25px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }

    .botones a:hover {
      background-color: #0056b3;
    }

    footer {
      margin-top: auto;
      padding: 20px;
      text-align: center;
      font-size: 0.9em;
      color: #888;
    }
  </style>
</head>
<body>
  <header>
    <h1>Bienvenido al Proyecto Final</h1>
  </header>

  <main>
    <p>¿Qué deseas hacer?</p>
    <div class="botones">
      <a href="catalogo.html">Ver Catálogo</a>
    </div>
  </main>

  <footer>
    &copy; 2025 Proyecto Final - Todos los derechos reservados
  </footer>
</body>
</html>
