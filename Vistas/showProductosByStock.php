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
                <li><a href="filterByDescripcion.php">Filtrar por Descripcion</a></li>
                <li><a href="filterByCodigo.php">Manipular Producto</a></li>
                <li><a href="../Controlador/controllerLogOut.php">Cerrar Sesion</a></li>
                <li><a href="updateProveedor.php">Mi Perfil</a></li>
            </ul>
        </nav>
    </header>

    <?php
    include_once "../Controlador/controllerFilterStock.php";
    if (isset($_SESSION['resultado'])) {
        $resultados = $_SESSION['resultado'];

        // Muestra los resultados en una tabla (puedes personalizar esto según tus necesidades)
        if (!empty($resultados)) {
            echo '<table border="1">
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Stock</th>
                    </tr>';
            
                    foreach ($resultados as $producto) {
                        echo '<tr>
                                <td>' . $producto->getCodigo() . '</td>
                                <td>' . $producto->getDescripcion() . '</td>
                                <td>' . $producto->getPrecio() . '</td>
                                <td>' . $producto->getStock() . '</td>
                              </tr>';
                    }
            
            echo '</table>';
        } else {
            echo '<p>No se encontraron resultados.</p>';
        }

        // Limpia la variable de sesión
        unset($_SESSION['resultado']);
    } else {
        echo '<p>No hay resultados disponibles.</p>';
    }    
    ?>
</body>
</html>

