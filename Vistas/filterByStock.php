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
                <li><a href="filtrarStock.php">Filtrar por Stock</a></li>
                <li><a href="filtrarDescripcion.php">Filtrar por Descripcion</a></li>
                <li><a href="manipularProducto.php">Manipular Producto</a></li>
            </ul>
        </nav>
    </header>

    <form action="../Controlador/controllerFilterStock.php" method="post">
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required>


        <button type="submit" name="filterStock">Buscar</button>
    </form>

</body>
</html>