<!DOCTYPE html>
<html lang="es">

<?php
require "./php/clases.php";
session_start();
require "./php/filtro.php";

if (empty($_SESSION['usuario'])) {
    header("Location: ./home.php");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos -->
    <link rel="stylesheet" href="./estilos/calendario.css">
    <link rel="stylesheet" href="./estilos/cabecera2.css">
    <link rel="stylesheet" href="./estilos/piepagina.css">

    <title>C.E.I. Andrés Bello</title>
</head>

<body>
    <?php require "./php/conexion.php"; ?>

    <header><?php require "./php/menu_interior.php"; ?></header>

    <main></main>

    <footer><?php require "./php/piepagina.php"; ?></footer>

    <!-- Javascripts -->
    <?php require "./php/cerrar_conexion.php"; ?>
    <script src="./js/menu2.js"></script>
</body>

</html>