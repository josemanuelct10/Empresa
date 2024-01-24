<?php
include_once "../Modelo/Proveedor.php";
include_once "../Modelo/ProveedorBD.php";
include_once "../Modelo/Producto.php";
session_start(); 

if (isset($_POST['filterDescripcion'])){
    $descripcion = $_POST['descripcion'];
    $proveedor = $_SESSION['proveedor'];

        $_SESSION['resultadoDescripcion'] = ProductoBD::getByDescripcion($proveedor, $descripcion);


    header("Location: ../Vistas/showProductosByDescripcion.php");
    exit();
}

?>
