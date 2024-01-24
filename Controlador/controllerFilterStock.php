<?php
include_once "../Modelo/Proveedor.php";
include_once "../Modelo/ProveedorBD.php";
include_once "../Modelo/Producto.php";
session_start(); 

if (isset($_POST['filterStock'])){
    $stock = $_POST['stock'];
    $proveedor = $_SESSION['proveedor'];

    $_SESSION['resultado'] = ProductoBD::getByStock($proveedor, $stock);

    header("Location: ../Vistas/showProductosByStock.php");
    exit();
}

?>
