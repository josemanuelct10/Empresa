<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/stylesMenu.css"/>
    <title>Empresa</title>
    <link rel="stylesheet" href="../Estilos/stylesMenu.css">
    <link rel="stylesheet" href="../Estilos/stylesForm.css">


</head>
<body>
    <header>
        <h1>Empresa</h1>

    </header>

    <form method="POST" action="../Controlador/controllerRegister.php">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" required/><br>

        <label for="pwd">Contraseña:</label>
        <input type="password" name="pwd" required/><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" required/><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required/><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required/><br>

        <input type="submit" name="register" value="Registrarse"/>

        <?php
        if (isset($_GET['error'])) {
            echo '<p>' . $_GET['error']. '</p>';
        }
        ?>
    </form>
</body>
</html>

