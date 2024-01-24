<?php
include_once "../Modelo/ProveedorBD.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signIn'])){
        try{
            $codigoInicio = $_POST['codigo'];
            $pwdInicio = $_POST['pwd'];
    
            // Obtener el proveedor usando el código ingresado
            $proveedor = ProveedorBD::getMin($codigoInicio);
    
            if ($proveedor && password_verify($pwdInicio, $proveedor->getPwd())) {
                // Almacenar el objeto del proveedor en la sesión
                $_SESSION['proveedor'] = $proveedor;
    
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
        
    } else {
        header("Location: ../Vistas/registerForm.php");
        exit();
    }
}
?>
