<?php
include_once "../Modelo/Proveedor.php";
include_once "../Modelo/ProveedorBD.php";
include_once "../Modelo/ProductoBD.php";
include_once "../Modelo/Producto.php";
session_start(); 



if (isset($_POST['filterCodigo']) && (isset($_SESSION['proveedor']))){
    $codigo = $_POST['codigo'];
    $proveedor = $_SESSION['proveedor'];
    $listaProductos = ProductoBD::getByProveedor($proveedor);

    $productoEncontrado = null;
    foreach ($listaProductos as $producto) {
        if ($producto->getCodigo() == $codigo) {
            $productoEncontrado = $producto;
            break; 
        }
    }
    $_SESSION['resultadoCodigo'] = $productoEncontrado;
    header("Location: ../Vistas/manipularProducto.php");
    exit();
    
}
?>
