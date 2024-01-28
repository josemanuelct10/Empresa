<?php
include_once "../Modelo/Proveedor.php";
include_once "../Modelo/ProveedorBD.php";
include_once "../Modelo/Producto.php";
include_once "../Modelo/ProductoBD.php";
session_start(); 
$proveedor = $_SESSION['proveedor'];

if (isset($_POST['editarProducto'])){
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $producto = new Producto($codigo, $descripcion, $precio, $stock, $proveedor);

    if (ProductoBD::update($producto, $proveedor)){
        header("Location: ../Vistas/inicio.php");
        exit();
    }
    
}
elseif (isset($_POST['eliminarProducto'])){
    $codigo = $_POST['codigo'];

    if(ProductoBD::delete($codigo)){
        header("Location: ../Vistas/inicio.php");
        exit();
    }


}

?>
