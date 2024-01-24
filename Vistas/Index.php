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

    <form method="post" action="../Controlador/controllerIndex.php">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo"/>

        <label for="pwd">Contraseña:</label>
        <input type="password" name="pwd"/>

        <input type="submit" name="signIn" value="Iniciar Sesión" />
        <input type="submit" name="register" value="Registrarse"/>
        <?php
        if (isset($_GET['error'])) {
            echo '<p>' .$_GET['error'] . '</p>';
        }
        ?>
    </form>
</body>
</html>

