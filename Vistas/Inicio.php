<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/stylesMenu.css"/>
    <title>Empresa</title>
    <link rel="stylesheet" href="../Estilos/stylesMenu.css">
    <link rel="stylesheet" href="../Estilos/stylesTable.css">
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

    <?php
    include_once "../Controlador/controllerInicio.php";
    mostrarProductos();
    ?>
</body>
</html>

