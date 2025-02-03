<!DOCTYPE html>
<html lang="es">

<?php require "./validar_sesion.php"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Logo -->
    <link rel="shortcut icon" href="../assets/lapiz.png" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="../assets/css/inicio.css">
    <link rel="stylesheet" href="../assets/css/cabecera2.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-grad-school-ext.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/lightbox.css">

    <title>C.E.I. Andrés Bello</title>
</head>

<body>
    <?php
    require "../assets/php/basedatos.php";
    require "./navbar.php";
    ?>

    <section class="section main-banner portada" id="top" data-section="section1">
        <div class="video-overlay header-text">
            <div class="caption">
                <h6>Bienvenido al Sistema <em><?php echo $_SESSION['usuario']; ?></em></h6>
                <h2><em>C.E.I.</em> Andrés Bello</h2>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <i class="fa fa-copyright"></i> Todos los derechos reservados para C.E.I. Andrés Bello
                        | Programado por Daniel Parra
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Scripts -->
<?php Cerrar_Conexion($database); ?>
<script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/video.js"></script>
<script src="assets/js/slick-slider.js"></script>
<script src="assets/js/custom.js"></script>

</html>