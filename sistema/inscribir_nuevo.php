<!DOCTYPE html>
<html lang="es">

<?php
require "./validar_sesion.php";

if (!isset($_POST['cedula-representante']) && !isset($_POST['ced-esc'])) {
    header("Location: ./inscripciones.php");
    exit;
};
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Logo -->
    <link rel="shortcut icon" href="../assets/lapiz.png" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="../assets/css/inicio.css">
    <link rel="stylesheet" href="../assets/css/inscripciones.css">
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

    <section id="inscripcion" class="section why-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Inscripciones Nuevo Ingreso</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <form class="formulario" id="inscripcion_form" method="post">
                        <input type="hidden" name="cedula_representante" value="<?php echo $_POST['cedula-representante']; ?>">
                        <input type="hidden" name="ced_esc" value="<?php echo $_POST['ced-esc']; ?>">
                        <input type="hidden" name="parentezco" value="<?php echo $_POST['parentezco']; ?>">
                        <input type="hidden" name="sexo" value="<?php echo $_POST['sexo']; ?>">
                        <input type="hidden" name="convive" value="<?php echo $_POST['convive']; ?>">
                        <input type="hidden" name="nom1" value="<?php echo $_POST['nom1']; ?>">
                        <input type="hidden" name="nom2" value="<?php echo $_POST['nom2']; ?>">
                        <input type="hidden" name="ape1" value="<?php echo $_POST['ape1']; ?>">
                        <input type="hidden" name="ape2" value="<?php echo $_POST['ape2']; ?>">
                        <input type="hidden" name="fecnac" value="<?php echo $_POST['fecnac']; ?>">
                        <input type="hidden" name="nacionalidad" value="<?php echo $_POST['nacionalidad']; ?>">
                        <input type="hidden" name="lugnac" value="<?php echo $_POST['lugnac']; ?>">
                        <input type="hidden" name="viaje" value="<?php echo $_POST['viaje']; ?>">
                        <input type="hidden" name="pais" value="<?php echo $_POST['pais']; ?>">
                        <input type="hidden" name="estado" value="<?php echo $_POST['estado']; ?>">
                        <input type="hidden" name="municipio" value="<?php echo $_POST['municipio']; ?>">
                        <input type="hidden" name="ciudad" value="<?php echo $_POST['ciudad']; ?>">
                        <input type="hidden" name="parroquia" value="<?php echo $_POST['parroquia']; ?>">
                        <input type="hidden" name="direccion" value="<?php echo $_POST['direccion']; ?>">
                        <input type="hidden" name="doctor" value="<?php echo $_POST['doctor']; ?>">
                        <input type="hidden" name="alergias" value="<?php echo $_POST['alergias']; ?>">
                        <input type="hidden" name="alergia_comida" value="<?php echo $_POST['alergia_comida']; ?>">
                        <input type="hidden" name="alergia_medicina" value="<?php echo $_POST['alergia_medicina']; ?>">
                        <input type="hidden" name="atencion_medica" value="<?php echo $_POST['atencion_medica']; ?>">
                        <input type="hidden" name="limitaciones" value="<?php echo $_POST['limitaciones']; ?>">
                        <input type="hidden" name="convulsiones" value="<?php echo $_POST['convulsiones']; ?>">
                        <input type="hidden" name="convulsiones_razon" value="<?php echo $_POST['convulsiones_razon']; ?>">
                        <input type="hidden" name="sae" value="<?php echo $_POST['sae']; ?>">
                        <input type="hidden" name="sae_razon" value="<?php echo $_POST['sae_razon']; ?>">
                        <input type="hidden" name="habitantes" value="<?php echo $_POST['habitantes']; ?>">
                        <input type="hidden" name="turno_alterno" value="<?php echo $_POST['turno_alterno']; ?>">
                        <input type="hidden" name="deportes" value="<?php echo $_POST['deportes']; ?>">
                        <input type="hidden" name="fin_semana" value="<?php echo $_POST['fin_semana']; ?>">
                        <input type="hidden" name="observacion" value="<?php echo $_POST['observacion']; ?>">

                        <?php
                        $sql = $database->prepare('SELECT m.matcodig, a.aulanomb, m.añsccodg, m.matturno, m.matgrupo, m.matsecco FROM tablamat AS m INNER JOIN tablaula AS a ON a.aulacodg = m.aulacodg WHERE m.añsccodg = ?');
                        $sql->bind_param("s", $añoescolar['añsccodg']);
                        $sql->execute();
                        $grupos = $sql->get_result();
                        $sql->close();

                        $html = "";
                        while ($grupo = $grupos->fetch_assoc()):
                            $html .= '<div id="tabs" class="row">';
                            $html .= '<div class="card text-white bg-secondary mb-3" style="max-width: 18rem; margin-left: 30px;">';
                            $html .= '<div class="card-header">Grupo ' . $grupo['matgrupo'] . '</div>';
                            $html .= '<div class="card-body text-warning">';
                            $html .= '<h5 class="card-title">Sección ' . $grupo['matsecco'] . '</h5>';
                            $html .= '<p class="card-text">Turno ' . $grupo['matturno'] . '</p>';
                            $html .= '<p class="card-text">Año Escolar ' . $grupo['añsccodg'] . '</p>';
                            $html .= '<p class="card-text">Salón: ' . $grupo['aulanomb'] . '</p>';
                            $html .= '<div class="botones">';
                            $html .= '<a href="../assets/php/procesar_inscripcion.php?codigo_grupo=' . $grupo['matcodig'] . '" class="btn btn-success mb-2" name="btn">Inscribir</a>';
                            $html .= '</div></div></div>';

                            $sql = $database->prepare('SELECT per.perscedi, per.persnom1, per.persape1, per.persnaco FROM detmatpo AS det INNER JOIN tabperso as doc ON det.persoced = doc.persoced INNER JOIN tablpers AS per ON doc.perscedi = per.perscedi WHERE det.matcodig = ?');
                            $sql->bind_param("s", $grupo['matcodig']);
                            $sql->execute();
                            $docentes = $sql->get_result();
                            $sql->close();

                            $html .= '<div class="card text-white bg-secondary mb-3" style="max-width: 70%; margin-left: 20px;">';
                            $html .= '<div class="card-header">Docentes</div>';
                            $html .= '<div class="card-body">';
                            $html .= '<ul class="list-group list-group-flush">';

                            while ($docente = $docentes->fetch_assoc()) {
                                $html .= '<li class="list-group-item list-group-item-action list-group-item-secondary">';
                                $html .= $docente['persnaco'] . '-' . $docente['perscedi'];
                                $html .= ' ' . $docente['persnom1'] . ' ' . $docente['persape1'] . '</li>';
                            };

                            $html .= '</ul></div></div></div>';
                        endwhile;

                        echo $html;
                        ?>
                    </form>
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