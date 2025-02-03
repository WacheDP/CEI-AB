<!DOCTYPE html>
<html lang="es">

<?php require "./validar_sesion.php"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Logo -->
    <link rel="shortcut icon" href="../assets/lapiz.png" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="../assets/css/grupos&secciones.css">
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

    date_default_timezone_set("America/Caracas");
    $sql = $database->prepare("SELECT ae.añsccodg FROM tbañoesc AS ae WHERE ? BETWEEN ae.añscfini AND ae.añscffin");
    $sql->bind_param("s", $hoy);
    $sql->execute();
    $añoescolar = $sql->get_result()->fetch_assoc();
    $sql->close();
    ?>

    <section class="section why-us grupos" data-section="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Grupos & Secciones</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <div id='tabs'>
                        <select name="turno" id="turno" class="form-select" onchange="SeleccionarTurno();" aria-label="Default select example">
                            <option value="">Seleccione un Turno</option>
                            <option value="MAÑANA">Mañana</option>
                            <option value="TARDE">Tarde</option>
                        </select>
                        <a href=""></a>
                        <div id="grupos"></div>

                        <form action="../assets/php/organizar_grupos&secciones.php" method="post">
                            <input type="hidden" id="añoescolar" name="añoescolar" value="<?php echo $añoescolar['añsccodg']; ?>">

                            <div class="row">
                                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem; margin-left: 30px;">
                                    <div class="card-header">
                                        <select class="form-select" name="grupo" id="grupo" required aria-label="Default select example">
                                            <option value="">Selecciona el Grupo</option>
                                            <option value="MATERNAL">Maternal</option>
                                            <option value="A">Grupo A</option>
                                            <option value="B">Grupo B</option>
                                            <option value="C">Grupo C</option>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" name="turno" id="turno2" required aria-label="Default select example">
                                            <option value="">Seleccione un Turno</option>
                                            <option value="MAÑANA">Mañana</option>
                                            <option value="TARDE">Tarde</option>
                                        </select>
                                        <select class="form-select" name="salon" id="salon" required aria-label="Default select example">
                                            <option value="">Selecciona el Salón</option>

                                            <?php
                                            $sql = $database->prepare('SELECT a.aulacodg, a.aulanomb FROM tablaula AS a, detlaula AS d WHERE a.aulacodg = d.aulacodg AND d.daulastt = "Habilitado" AND a.aulanomb LIKE "Aula%"');
                                            $sql->execute();
                                            $salones = $sql->get_result();

                                            $html = "";
                                            while ($salon = $salones->fetch_assoc()) {
                                                $html .= '<option value="' . $salon['aulacodg'] . '">' . $salon['aulanomb'] . '</option>';
                                            }
                                            echo $html;

                                            $sql->close();
                                            ?>
                                        </select>
                                        <div id="validacion" class="botones"></div>
                                    </div>
                                </div>

                                <div class="card text-white bg-secondary mb-3" style="max-width: 70%; margin-left: 20px;">
                                    <div class="card-header">Docentes</div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action list-group-item-secondary">
                                                <select class="form-select" name="docente1" id="docente1" required aria-label="Default select example">
                                                    <option value="">Seleccione el Docente</option>

                                                    <?php
                                                    $sql = $database->prepare('SELECT p.perscedi, p.persnom1, p.persape1 FROM tabluser AS u, tablpers AS p WHERE u.perscedi = p.perscedi AND u.usercode = 3 AND u.userstat = "Habilitado"');
                                                    $sql->execute();
                                                    $profesores = $sql->get_result();
                                                    $sql->close();

                                                    $html = "";
                                                    while ($docente = $profesores->fetch_assoc()) {
                                                        $html .= '<option value="' . $docente['perscedi'] . '">';
                                                        $html .= $docente['perscedi'] . ' ' . $docente['persnom1'] . ' ' . $docente['persape1'];
                                                        $html .= '</option>';
                                                    }
                                                    echo $html;
                                                    ?>
                                                </select>
                                            </li>
                                            <li class="list-group-item list-group-item-action list-group-item-secondary">
                                                <select class="form-select" name="docente2" id="docente2" aria-label="Default select example">
                                                    <option value="">Seleccione el Docente</option>

                                                    <?php
                                                    $sql = $database->prepare('SELECT p.perscedi, p.persnom1, p.persape1 FROM tabluser AS u, tablpers AS p WHERE u.perscedi = p.perscedi AND u.usercode = 3 AND u.userstat = "Habilitado"');
                                                    $sql->execute();
                                                    $profesores = $sql->get_result();
                                                    $sql->close();

                                                    $html = "";
                                                    while ($docente = $profesores->fetch_assoc()) {
                                                        $html .= '<option value="' . $docente['perscedi'] . '">';
                                                        $html .= $docente['perscedi'] . ' ' . $docente['persnom1'] . ' ' . $docente['persape1'];
                                                        $html .= '</option>';
                                                    }
                                                    echo $html;
                                                    ?>
                                                </select>
                                            </li>
                                            <li class="list-group-item list-group-item-action list-group-item-secondary">
                                                <select class="form-select" name="docente3" id="docente3" aria-label="Default select example">
                                                    <option value="">Seleccione el Docente</option>

                                                    <?php
                                                    $sql = $database->prepare('SELECT p.perscedi, p.persnom1, p.persape1 FROM tabluser AS u, tablpers AS p WHERE u.perscedi = p.perscedi AND u.usercode = 3 AND u.userstat = "Habilitado"');
                                                    $sql->execute();
                                                    $profesores = $sql->get_result();
                                                    $sql->close();

                                                    $html = "";
                                                    while ($docente = $profesores->fetch_assoc()) {
                                                        $html .= '<option value="' . $docente['perscedi'] . '">';
                                                        $html .= $docente['perscedi'] . ' ' . $docente['persnom1'] . ' ' . $docente['persape1'];
                                                        $html .= '</option>';
                                                    }
                                                    echo $html;
                                                    ?>
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- Scripts -->
<?php Cerrar_Conexion($database); ?>
<script src="../assets/js/grupos&secciones.js"></script>
<script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/video.js"></script>
<script src="assets/js/slick-slider.js"></script>
<script src="assets/js/custom.js"></script>

</html>