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

    <?php
    include_once "../Modelo/ProveedorBD.php";
    session_start();
    $proveedor = $_SESSION['proveedor'];
    $proveedorCompleto = ProveedorBD::getMax($proveedor);
    ?>
    <form action="../Controlador/controllerUsuario.php" method="post">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" value='<?=$proveedor->getCodigo()?>'required readonly>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value='<?=$proveedor->getTelefono()?>' required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value='<?=$proveedor->getEmail()?>' required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value='<?=$proveedor->getDireccion()?>' required>

        <button type="submit" name="updateProveedor">Actualizar Proveedor</button>´
        <button type="submit" name="updatePwd">Actualizar Contraseña</button>
    </form>


</body>
</html>
