<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/stylesMenu.css"/>
    <title>Empresa</title>
    <link rel="stylesheet" href="../Estilos/stylesForm.css"/>
</head>

<body>
    <header>
        <h1>Empresa</h1>
        <nav>
            <ul>
                <li><a href="Inicio.php">Inicio</a></li>
                <li><a href="addProducto.php">Añadir Producto</a></li>
                <li><a href="filterByStock.php">Filtrar por Stock</a></li>
                <li><a href="filterByDescripcion.php">Filtrar por Descripcion</a></li>
                <li><a href="filterByCodigo.php">Manipular Producto</a></li>
                <li><a href="../Controlador/controllerLogOut.php">Cerrar Sesion</a></li>
                <li><a href="updateProveedor.php">Mi Perfil</a></li>
            </ul>
        </nav>
    </header>

    <form action="../Controlador/controllerFilterDescripcion.php" method="post">
        <label for="descripcion">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion" required>


        <button type="submit" name="filterDescripcion">Buscar</button>
    </form>

</body>
</html>