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
                <li><a href="filtrarDescripcion.php">Filtrar por Descripcion</a></li>
                <li><a href="manipularProducto.php">Manipular Producto</a></li>
            </ul>
        </nav>
    </header>

    <form action="../Controlador/controllerAdd.php" method="post">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required>

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required>

        <button type="submit" name="addProducto">Agregar Producto</button>
    </form>

</body>
</html>
