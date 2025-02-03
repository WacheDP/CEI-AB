<!DOCTYPE html>
<html lang="es">

<?php require "../validar_sesion.php"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Logo -->
    <link rel="shortcut icon" href="../assets/lapiz.png" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="../../assets/css/salones.css">
    <link rel="stylesheet" href="../../assets/css/inicio.css">
    <link rel="stylesheet" href="../../assets/css/cabecera2.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-grad-school-ext.css">
    <link rel="stylesheet" href="../../assets/css/owl.css">
    <link rel="stylesheet" href="../../assets/css/lightbox.css">

    <title>C.E.I. Andrés Bello</title>
</head>

<body>
    <?php
    require "../../assets/php/basedatos.php";
    require "./navbar.php";
    ?>

    <section id="salones" class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Salones</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <div id='tabs'>
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Salón</th>
                                    <th scope="col">Ultima Actualización</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Observación</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $database->prepare("SELECT d.daulacod, a.aulanomb, d.dauladia, d.daulastt, d.daulaobv FROM detlaula AS d, tablaula AS a WHERE a.aulacodg = d.aulacodg");
                                $sql->execute();
                                $aulas = $sql->get_result();
                                $sql->close();

                                $html = "";
                                $n = 1;
                                while ($aula = $aulas->fetch_assoc()) {
                                    $html .= '<tr>';
                                    $html .= '<th scope="row">' . $n . '</th>';
                                    $html .= '<td>' . $aula['aulanomb'] . '</td>';
                                    $html .= '<td>' . $aula['dauladia'] . '</td>';
                                    $html .= '<td>' . $aula['daulastt'] . '</td>';
                                    $html .= '<td>' . $aula['daulaobv'] . '</td>';
                                    $html .= '<td><button type="button" class="btn btn-primary">';
                                    $html .= '<a href="./CRUD/salones.php?salon=' . $aula['daulacod'] . '">';
                                    $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">';
                                    $html .= '<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />';
                                    $html .= '</svg></a></button></td>';
                                    $html .= '</tr>';

                                    $n++;
                                };

                                echo $html;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- Scripts -->
<?php Cerrar_Conexion($database); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/video.js"></script>
<script src="assets/js/slick-slider.js"></script>
<script src="assets/js/custom.js"></script>

</html>