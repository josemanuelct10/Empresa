<?php
session_start(); // Iniciar la sesión si no está iniciada

// Cerrar todas las sesiones
session_unset();
session_destroy();

// Redirigir a otro formulario
header("Location: ../Vistas/index.php");
exit();
?>