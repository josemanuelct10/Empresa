<?php
include_once "../Modelo/Proveedor.php";
include_once "../Modelo/ProveedorBD.php";
include_once "../Modelo/Producto.php";
session_start(); 


function mostrarProductosByStock(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['filterStock'])){
            $stock = $_POST['stock'];
            $proveedor = $_SESSION['proveedor'];
            $arrayProductos = ProductoBD::getByStock($proveedor, $stock);

            // Devolver el array antes de la redirección
            return $arrayProductos;
        }
    }

}

// Llamar a la función y obtener el array de productos
$arrayProductos = mostrarProductosByStock();

// Verificar si el array es válido antes de redirigir
if (!is_null($arrayProductos)) {
    // Redirigir solo si se obtuvo un array válido
    header("Location: ../Vistas/showProductosByStock.php");
    exit();
}
?>
