<?php
include_once "../Modelo/Proveedor.php";
include_once "../Modelo/ProveedorBD.php";
session_start();

function getProductosProveedor($codigoProveedor) {
    $proveedor = ProveedorBD::getMin($codigoProveedor);
    $proveedorCompleto = ProveedorBD::getMax($proveedor);
    return $proveedorCompleto->getMisProductos();
}
function mostrarProductos() {
    $proveedor = isset($_SESSION['proveedor']) ? $_SESSION['proveedor'] : null;

    if ($proveedor !== null) {
        $productosProveedor = getProductosProveedor($proveedor->getCodigo());
        } else {
        echo 'No se ha seleccionado un proveedor.';
    }
    

    if (!empty($productosProveedor)) {
        echo '<table>';
        echo '<tr><th>Código</th><th>Descripción</th><th>Precio</th><th>Stock</th></tr>';
        foreach ($productosProveedor as $producto) {
                echo '<tr>';
                echo '<td>' . $producto->getCodigo() . '</td>';
                echo '<td>' . $producto->getDescripcion() . '</td>';
                echo '<td>' . $producto->getPrecio() . '</td>';
                echo '<td>' . $producto->getStock() . '</td>';
                echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No hay productos disponibles para este proveedor.';
    }
}
?>
