<?php
include_once "../controlador/controllerFilterByCodigo.php";
$producto = null;
if (isset($_SESSION['resultadoCodigo'])) {
    $producto = $_SESSION['resultadoCodigo'];
}
?>
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

    <?php if ($producto instanceof Producto): ?>
        <form action="../Controlador/controllerUpdate.php" method="post">
            <label for="codigo">Código:</label>
            <input type='text' value='<?=$producto->getCodigo()?>' required name='codigo' readonly>

            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" value="<?= $producto->getDescripcion() ?>" required>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" value="<?= $producto->getPrecio() ?>" required>

            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="<?= $producto->getStock() ?>" required>

            <button type="submit" name="editarProducto">Actualizar Producto</button>
            <button type="submit" name="eliminarProducto">Eliminar Producto</button>
        </form>
    <?php else: ?>
        <p>El producto buscado no existe o te pertenece.</p>
    <?php endif; ?>

</body>
</html>
