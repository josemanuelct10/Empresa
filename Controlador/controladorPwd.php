<?php
include_once '../Modelo/ProveedorBD.php';
include_once '../Modelo/Proveedor.php';

session_start();

if (isset($_POST['updatePwd'])) {
    // Recuperar proveedor de la sesión
    $proveedor = $_SESSION['proveedor'];

    // Validar que la sesión contiene un objeto de la clase Proveedor
    if ($proveedor instanceof Proveedor) {
        // Recuperar la contraseña antigua proporcionada por el usuario
        $oldPassword = $_POST['pwdAntigua'];

        // Verificar si la contraseña antigua coincide con la almacenada en el objeto proveedor
        if (password_verify($oldPassword, $proveedor->getPwd())) {
            // La contraseña antigua es correcta, ahora podemos actualizar la contraseña
            $newPassword = $_POST['pwdNueva'];

            // Actualizar la contraseña del proveedor
            $proveedor->setPwd(password_hash($newPassword, PASSWORD_DEFAULT));

            // Llamar al método de la base de datos para actualizar la contraseña
            if (ProveedorBD::updatePassword($proveedor->getCodigo(), $proveedor->getPwd())) {
                // Redirigir o realizar cualquier acción adicional después de la actualización
                header('Location: ../Vistas/Inicio.php');
                exit();
            } else {
                // Manejar error si la actualización falla
                header('Location: ../Vistas/updatePwd.php');
                exit();
            }
        } else {
            // La contraseña antigua proporcionada no coincide con la almacenada
            header('Location: ../Vistas/updatePwd.php?message=Contraseña antigua incorrecta');
            exit();
        }
    } else {
        // Manejar el caso en que la sesión no contiene un objeto Proveedor
        header('Location: ../Vistas/updatePwd.php');
        exit();
    }
}
?>
