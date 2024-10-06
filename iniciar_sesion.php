<!DOCTYPE html>
<html lang="es">

<?php
session_start();

if (!empty($_SESSION['usuario'])) {
    header("Location: ./sistema.php");
    exit();
};
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Logo -->
    <link rel="shortcut icon" href="./recursos/lapiz.png" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="./estilos/iniciar_sesion.css">
    <link rel="stylesheet" href="./estilos/cabecera.css">
    <link rel="stylesheet" href="./estilos/piepagina.css">

    <title>Iniciar Sesión</title>
</head>

<body>
    <header><?php require "./php/cabecera.php"; ?></header>

    <main>
        <form action="./php/procesar_inicio.php" method="post">
            <label for="usuario">Nombre de Usuario: </label>
            <div>
                <input type="text" name="usuario" id="usuario" placeholder="usuario123" required>
            </div>
            <div id="validar-user"></div>
            <label for="contraseña">Contraseña: </label>
            <div>
                <input type="password" name="contraseña" id="contraseña" placeholder="********" required>
            </div>
            <div id="validar-password"></div>

            <input type="submit" value="Iniciar Sesión" id="inicio-btn" name="inicio-btn">
        </form>
    </main>

    <footer><?php require "./php/piepagina.php"; ?></footer>

    <!-- Javascripts -->
    <script src="./js/menu.js"></script>
    <script src="./js/validar_inicio.js"></script>
</body>

</html>