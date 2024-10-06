<!DOCTYPE html>
<html lang="es">

<?php
require "./php/clases.php";
session_start();
require "./php/filtro.php";

if (empty($_SESSION['usuario'])) {
    header("Location: ./home.php");
    exit();
};
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Logo -->
    <link rel="shortcut icon" href="./recursos/lapiz.png" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="./estilos/sistema_principal.css">
    <link rel="stylesheet" href="./estilos/cabecera2.css">
    <link rel="stylesheet" href="./estilos/piepagina.css">

    <title>C.E.I. Andrés Bello</title>
</head>

<body>
    <header><?php require "./php/menu_interior.php"; ?></header>

    <main id="collage">
        <div class="img1"></div>
        <div class="img2"></div>
        <div class="img3"></div>
        <div class="img4"></div>

        <h1 class="p1">BIENVENIDOS AL SISTEMA PRINCIPAL</h1>
        <h1 class="p2">CENTRO DE EDUCACIÓN INICIAL</h1>
        <h1 class="p3">ANDRÉS BELLO</h1>
    </main>

    <footer><?php require "./php/piepagina.php"; ?></footer>

    <!-- Javascripts -->
    <script src="./js/menu2.js"></script>
</body>

</html>