<!DOCTYPE html>
<html lang="es">

<?php
require "./validar_sesion.php";
require "./validar_nivel.php";

if (Validar_Nivel("Planificacion")) {
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
    <link rel="stylesheet" href="../assets/css/planificacion.css">
    <link rel="stylesheet" href="../assets/css/cronograma.css">
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
    $hoy = date("Y-m-d");
    $sql = $database->prepare('SELECT * FROM tbañoesc AS ae WHERE ? BETWEEN ae.añscfini AND ae.añscffin');
    $sql->bind_param("s", $hoy);
    $sql->execute();
    $añoescolar = $sql->get_result();
    $numero = $añoescolar->num_rows;
    $sql->close();
    ?>

    <?php if ($numero == 0): ?>
        <section id="crearañoescolar" class="section why-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Crear Año Escolar</h2>
                        </div>
                    </div>

                    <form action="../assets/php/procesar_añoescolar.php" class="formulario" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inicio" class="label-form">Inicio de Año Escolar</label>
                                <input type="date" class="form-control" id="inicio" name="inicio" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="final" class="label-form">Fin de Año Escolar</label>
                                <input type="date" class="form-control" id="final" name="final" required>
                            </div>
                        </div>

                        <div id="creacion"></div>
                    </form>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    if ($numero == 1):
        $añoescolar = $añoescolar->fetch_assoc();
    ?>
        <section id="editarañoescolar" class="section why-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Editar Año Escolar</h2>
                        </div>
                    </div>

                    <form action="../assets/php/editar_añoescolar.php" class="formulario" method="post">
                        <input type="hidden" name="codigo" value="<?php echo $añoescolar['añsccodg']; ?>">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inicio" class="label-form">Inicio de Año Escolar</label>
                                <input type="date" class="form-control" id="inicio2" name="inicio" value="<?php echo $añoescolar['añscfini']; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="final" class="label-form">Fin de Año Escolar</label>
                                <input type="date" class="form-control" id="final2" name="final" value="<?php echo $añoescolar['añscffin']; ?>" required>
                            </div>
                        </div>

                        <div id="edicion">
                            <input type="submit" class="btn btn-success boton" name="btn" value="Editar">
                            <div class="alert alert-danger alerta" role="alert">
                                La fecha de inicio no es válida <br> La fecha de final no es válida
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section id="cronograma" class="section why-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Cronograma de Actividades</h2>
                        </div>
                    </div>

                    <form action="../assets/php/cronograma_actividades.php" class="formulario" method="post">
                        <input type="hidden" name="codigo" value="<?php echo $añoescolar['añsccodg']; ?>">

                        <div id="parte1">
                            <div class="form-group row">
                                <label for="actividad1" class="col-sm-2 col-form-label texto-label">Actividad</label>
                                <div class="col-sm-10 caja-input">
                                    <select name="actividad1" id="actividad1" class="form-select">
                                        <option value="">Seleccione la actividad</option>
                                        <option value="INSCRIPCIONES">Inscripciones</option>
                                        <option value="ORGANIZACIÓN DE GRUPOS Y SECCIONES">Organización de Grupos y Secciones</option>
                                    </select>
                                </div>
                            </div>
                            <div id="date1-1" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha1-1" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date1-2" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha1-2" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date1-3" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha1-3" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date1-4" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha1-4" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date1-5" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha1-5" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-10 caja-input">
                                <label class="col-sm-2 col-form-label texto-label">Agregar Fechas</label>
                                <button onclick="Aumentar_Fechas(1, 2);" id="btn1-1" type="button" class="btn btn-success">+</button>
                                <button onclick="Aumentar_Fechas(1, 3);" id="btn1-2" type="button" class="btn btn-success">+</button>
                                <button onclick="Quitar_Fechas(1, 1);" id="btn1-3" type="button" class="btn btn-danger">-</button>
                                <button onclick="Aumentar_Fechas(1, 4);" id="btn1-4" type="button" class="btn btn-success">+</button>
                                <button onclick="Quitar_Fechas(1, 2);" id="btn1-5" type="button" class="btn btn-danger">-</button>
                                <button onclick="Aumentar_Fechas(1, 5);" id="btn1-6" type="button" class="btn btn-success">+</button>
                                <button onclick="Quitar_Fechas(1, 3);" id="btn1-7" type="button" class="btn btn-danger">-</button>
                                <button onclick="Quitar_Fechas(1, 4);" id="btn1-8" type="button" class="btn btn-danger">-</button>
                            </div>
                        </div>

                        <div id="parte2">
                            <div class="form-group row">
                                <label for="actividad2" class="col-sm-2 col-form-label texto-label">Actividad</label>
                                <div class="col-sm-10 caja-input">
                                    <select name="actividad2" id="actividad2" class="form-select">
                                        <option value="">Seleccione la actividad</option>
                                        <option value="INSCRIPCIONES">Inscripciones</option>
                                        <option value="ORGANIZACIÓN DE GRUPOS Y SECCIONES">Organización de Grupos y Secciones</option>
                                    </select>
                                </div>
                            </div>
                            <div id="date2-1" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha2-1" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date2-2" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha2-2" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date2-3" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha2-3" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date2-4" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha2-4" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date2-5" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha2-5" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-10 caja-input">
                                <label class="col-sm-2 col-form-label texto-label">Agregar Fechas</label>
                                <button onclick="Aumentar_Fechas(2, 2);" id="btn2-1" type="button" class="btn btn-success">+</button>
                                <button onclick="Aumentar_Fechas(2, 3);" id="btn2-2" type="button" class="btn btn-success">+</button>
                                <button onclick="Quitar_Fechas(2, 1);" id="btn2-3" type="button" class="btn btn-danger">-</button>
                                <button onclick="Aumentar_Fechas(2, 4);" id="btn2-4" type="button" class="btn btn-success">+</button>
                                <button onclick="Quitar_Fechas(2, 2);" id="btn2-5" type="button" class="btn btn-danger">-</button>
                                <button onclick="Aumentar_Fechas(2, 5);" id="btn2-6" type="button" class="btn btn-success">+</button>
                                <button onclick="Quitar_Fechas(2, 3);" id="btn2-7" type="button" class="btn btn-danger">-</button>
                                <button onclick="Quitar_Fechas(2, 4);" id="btn2-8" type="button" class="btn btn-danger">-</button>
                            </div>
                        </div>

                        <div id="parte3">
                            <div class="form-group row">
                                <label for="actividad3" class="col-sm-2 col-form-label texto-label">Actividad</label>
                                <div class="col-sm-10 caja-input">
                                    <select name="actividad3" id="actividad3" class="form-select">
                                        <option value="">Seleccione la actividad</option>
                                        <option value="INSCRIPCIONES">Inscripciones</option>
                                        <option value="ORGANIZACIÓN DE GRUPOS Y SECCIONES">Organización de Grupos y Secciones</option>
                                    </select>
                                </div>
                            </div>
                            <div id="date3-1" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha3-1" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date3-2" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha3-2" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date3-3" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha3-3" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date3-4" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha3-4" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id="date3-5" class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label texto-label">Fecha</label>
                                <div class="col-sm-10 caja-input">
                                    <input type="date" name="fecha3-5" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-10 caja-input">
                                <label class="col-sm-2 col-form-label texto-label">Agregar Fechas</label>
                                <button onclick="Aumentar_Fechas(3, 2);" id="btn3-1" type="button" class="btn btn-success">+</button>
                                <button onclick="Aumentar_Fechas(3, 3);" id="btn3-2" type="button" class="btn btn-success">+</button>
                                <button onclick="Quitar_Fechas(3, 1);" id="btn3-3" type="button" class="btn btn-danger">-</button>
                                <button onclick="Aumentar_Fechas(3, 4);" id="btn3-4" type="button" class="btn btn-success">+</button>
                                <button onclick="Quitar_Fechas(3, 2);" id="btn3-5" type="button" class="btn btn-danger">-</button>
                                <button onclick="Aumentar_Fechas(3, 5);" id="btn3-6" type="button" class="btn btn-success">+</button>
                                <button onclick="Quitar_Fechas(3, 3);" id="btn3-7" type="button" class="btn btn-danger">-</button>
                                <button onclick="Quitar_Fechas(3, 4);" id="btn3-8" type="button" class="btn btn-danger">-</button>
                            </div>
                        </div>

                        <div class="col-sm-10 caja-input">
                            <label class="col-sm-2 col-form-label texto-label">Agregar Actividades</label>
                            <button id="act1" onclick="Aumentar_Actividades(2);" type="button" class="btn btn-success">+</button>
                            <button id="act2" onclick="Aumentar_Actividades(3);" type="button" class="btn btn-success">+</button>
                            <button id="act3" onclick="Quitar_Actividades(1);" type="button" class="btn btn-danger">-</button>
                            <button id="act4" onclick="Quitar_Actividades(2);" type="button" class="btn btn-danger">-</button>
                        </div>

                        <input type="submit" class="btn btn-success boton" name="btn" value="Registrar">
                    </form>
                </div>
            </div>
        </section>
    <?php endif; ?>
</body>

<!-- Scripts -->
<?php Cerrar_Conexion($database); ?>
<script src="../assets/js/año_escolar.js"></script>
<script src="../assets/js/cronograma.js"></script>
<script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/video.js"></script>
<script src="assets/js/slick-slider.js"></script>
<script src="assets/js/custom.js"></script>

</html>