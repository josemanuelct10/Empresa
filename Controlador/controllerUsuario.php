<?php
include_once '../Modelo/ProveedorBD.php';
include_once '../Modelo/Proveedor.php';

if (isset($_POST['updateProveedor'])){
    $codigo = $_POST['codigo'];
    $pwd = "";
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    $proveedor = new Proveedor($codigo, $pwd, $telefono, $email, $direccion);

    if (ProveedorBD::update($proveedor)){
        // Destruir la sesión existente
        session_start();
        session_unset();
        session_destroy();

        // Crear una nueva sesión
        session_start();
        $proveedorMin = ProveedorBD::getMin($codigo);
        $_SESSION['proveedor'] = ProveedorBD::getMax($proveedorMin);

        header('Location: ../Vistas/Inicio.php');
        exit();
    }
}
elseif (isset($_POST['updatePwd'])){
    header('Location: ../Vistas/updatePwd.php');
}
?>
