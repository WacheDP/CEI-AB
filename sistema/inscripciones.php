<!DOCTYPE html>
<html lang="es">

<?php
require "./validar_sesion.php";
require "./validar_actividad.php";

if (!Validar_Actividad("INSCRIPCIONES")) {
    header("Location: ./inicio.php");
    exit;
};
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Logo -->
    <link rel="shortcut icon" href="../assets/lapiz.png" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="../assets/css/inscripciones.css">
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

    if (isset($_GET['niño'])) {
        $sql = $database->prepare('SELECT n.nñcedesc FROM tablniño AS n WHERE n.nñcedesc = ?');
        $sql->bind_param("s", $_GET['niño']);
        $sql->execute();
        $validacion = $sql->get_result()->num_rows;
        $sql->close();

        if ($validacion != 1) {
            header("Location: ./inicio.php");
            exit;
        };
    } else {
        header("Location: ./inicio.php");
        exit;
    };

    date_default_timezone_set("America/Caracas");
    $hoy = date("Y-m-d");
    $sql = $database->prepare("SELECT ae.añsccodg FROM tbañoesc AS ae WHERE ? BETWEEN ae.añscfini AND ae.añscffin");
    $sql->bind_param("s", $hoy);
    $sql->execute();
    $añoescolar = $sql->get_result()->fetch_assoc();
    $sql->close();
    ?>

    <section id="inscripcion" class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2><?php echo "Inscripciones " . $añoescolar['añsccodg']; ?></h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <div id='tabs'>
                        <input type="hidden" name="niño" id="niño" value="<?php echo $_GET['niño']; ?>">

                        <?php
                        $cadena = "";
                        $cadena .= 'SELECT m.matcodig, a.aulanomb, m.matgrupo, m.matsecco, m.matturno, m.añsccodg ';
                        $cadena .= 'FROM tablamat AS m INNER JOIN tablaula AS a ON m.aulacodg = a.aulacodg ';
                        $cadena .= 'WHERE m.añsccodg = ? ORDER BY m.matturno DESC;';

                        $sql = $database->prepare($cadena);
                        $sql->bind_param("s", $añoescolar['añsccodg']);
                        $sql->execute();
                        $grupos = $sql->get_result();
                        $sql->close();

                        $html = "";
                        while ($materia = $grupos->fetch_assoc()) {
                            $html .= '<div class="row">';
                            $html .= '<div class="card text-white bg-secondary mb-3" style="max-width: 18rem; margin-left: 30px;">';
                            $html .= '<div class="card-header">Grupo ' . $materia['matgrupo'] . '</div>';
                            $html .= '<div class="card-body text-warning">';
                            $html .= '<h5 class="card-title">Sección ' . $materia['matsecco'] . '</h5>';
                            $html .= '<p class="card-text">Turno ' . $materia['matturno'] . '</p>';
                            $html .= '<p class="card-text">Año Escolar ' . $materia['añsccodg'] . '</p>';
                            $html .= '<p class="card-text">Salón: ' . $materia['aulanomb'] . '</p>';
                            $html .= '<div class="botones">';
                            $html .= '<button type="button" onclick="Inscribirse(\'' . $materia['matcodig'] . '\', \'' . $materia['matgrupo'] . '\', \'' . $materia['matsecco'] . '\', \'' . $materia['matturno'] . '\');" class="btn btn-success">Inscribir</button>';
                            $html .= '</div></div></div>';

                            $sql = $database->prepare("SELECT q.perscedi, q.persnom1, q.persape1, q.persnaco FROM detmatpo AS d, tabperso AS p, tablpers AS q WHERE p.perscedi = q.perscedi AND d.persoced = p.persoced AND d.matcodig = ?");
                            $sql->bind_param("s", $materia['matcodig']);
                            $sql->execute();
                            $profesores = $sql->get_result();
                            $sql->close();

                            $html .= '<div class="card text-white bg-secondary mb-3" style="max-width: 70%; margin-left: 20px;">';
                            $html .= '<div class="card-header">Docentes</div>';
                            $html .= '<div class="card-body">';
                            $html .= '<ul class="list-group list-group-flush">';

                            while ($docente = $profesores->fetch_assoc()) {
                                $html .= '<li class="list-group-item list-group-item-action list-group-item-secondary">';
                                $html .= $docente['persnaco'] . '-' . $docente['perscedi'] . ' ' . $docente['persnom1'] . ' ' . $docente['persape1'] . '</li>';
                            }

                            $html .= '</ul></div></div></div>';
                        }

                        echo $html;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- Scripts -->
<?php Cerrar_Conexion($database); ?>
<script src="../assets/js/inscripciones.js"></script>
<script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/video.js"></script>
<script src="assets/js/slick-slider.js"></script>
<script src="assets/js/custom.js"></script>

</html>