<?php
include_once "../Modelo/Proveedor.php";
include_once "../Modelo/ProveedorBD.php";
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        try {
            $codigoProveedor = $_POST['codigo'];  
            $proveedor = new Proveedor($codigoProveedor, $_POST['pwd'], $_POST['telefono'], $_POST['email'], $_POST['direccion']);

            $resultado = ProveedorBD::getMin($codigoProveedor);

            if ($resultado === null) {
                // Agregar el proveedor
                if (ProveedorBD::add($proveedor)) {
                    // Redirigir al controlador de inicio con el código del proveedor
                    $_SESSION['proveedor'] = $proveedor;
                    header("Location: ../Vistas/Inicio.php");
                    exit();
                } else {
                    // Si el método add devuelve false, redirigir con un mensaje de error
                    header("Location: ../Vistas/registerForm.php?error=Error al registrarse.");
                    exit();
                }
            } else {
                // Si el método de comprobación devuelve false, redirigir con un mensaje de error específico
                header("Location: ../Vistas/registerForm.php?error=Ya existe un usuario con ese codigo.");
                exit();
            }
        } catch (Exception $e) {
            // Manejar cualquier otra excepción
            echo "Error: " . $e->getMessage();
            header("Location: ../Vistas/registerForm.php?error=exception");
            exit();
        }
    }
}
?>
