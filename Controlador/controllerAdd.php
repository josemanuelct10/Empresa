<?php
include_once "../Modelo/Proveedor.php";
include_once "../Modelo/ProveedorBD.php";
include_once "../Modelo/Producto.php";
session_start(); // Inicia la sesión

$proveedor = $_SESSION['proveedor'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addProducto'])){
        try{
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];

            $producto = new Producto($codigo, $descripcion, $precio, $stock, $proveedor);

            if (ProductoBD::add($producto, $proveedor)) {
                // Redirigir a Inicio.php y pasar el código del proveedor
                header("Location: ../Vistas/Inicio.php");
                exit();
            } else {
                header("Location: ../Vistas/Index.php?error=La contraseña o el usuario es incorrecto.");
                exit();
            }
        }
        catch (Exception $e) {
            echo "Error: ".$e->getMessage();
            header("Location: ../Vistas/Index.php?error=exception");
            exit();
        }
        
    }
}

?>
