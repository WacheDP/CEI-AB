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
    ?>

    <section id="inscripcion" class="section why-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Inscribir un Nuevo Niño</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <form class="formulario" action="./planillasalud_niños.php" method="post">
                        <input type="hidden" name="cedula-representante" value="<?php echo $_SESSION['cedula']; ?>">

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="ced-esc" class="label-form">Cedula Escolar</label>
                                <input type="text" class="form-control caja-input" id="ced-esc" name="ced-esc" placeholder="XXXXXXXXXXXX" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="parentezco" class="label-form">Parentezco</label>
                                <select class="form-select caja-input" id="parentezco" name="parentezco" aria-label="Default select example" required>
                                    <option value="">Seleccione el parentezco</option>
                                    <option value="MADRE">Madre del Niño</option>
                                    <option value="PADRE">Padre del Niño</option>
                                    <option value="REPRESENTANTE">Representante Legal</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sexo" class="label-form">Genero</label>
                                <select class="form-select caja-input" id="sexo" name="sexo" aria-label="Default select example" required>
                                    <option value="">Seleccione un genero</option>
                                    <option value="V">Niño</option>
                                    <option value="H">Niña</option>
                                </select>
                            </div>
                            <div class="form-group check col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input caja-input" type="checkbox" id="convive" name="convive">
                                    <label class="form-check-label" for="convive">
                                        ¿Vive usted con el niño o niña?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="nom1" class="label-form">Primer Nombre</label>
                                <input type="text" class="form-control caja-input" id="nom1" name="nom1" placeholder="Pedro" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nom2" class="label-form">Segundo Nombre</label>
                                <input type="text" class="form-control caja-input" id="nom2" name="nom2" placeholder="Antonio">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ape1" class="label-form">Primer Apellido</label>
                                <input type="text" class="form-control caja-input" id="ape1" name="ape1" placeholder="Peréz" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ape2" class="label-form">Segundo Apellido</label>
                                <input type="text" class="form-control caja-input" id="ape2" name="ape2" placeholder="Juanéz">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="fecnac" class="label-form">Fecha de Nacimiento</label>
                                <input type="date" class="form-control caja-input" id="fecnac" name="fecnac" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nacionalidad" class="label-form">Nacionalidad</label>
                                <select class="form-select caja-input" id="nacionalidad" name="nacionalidad" aria-label="Default select example" required>
                                    <option value="">Seleccione la nacionalidad</option>
                                    <option value="V">Venezolano</option>
                                    <option value="E">Extranjero</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lugnac" class="label-form">Lugar de Nacimiento</label>
                                <input type="text" class="form-control caja-input" id="lugnac" name="lugnac" placeholder="San Cristóbal, Estado Táchira">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="viaje" class="label-form">Medios de Transporte</label>
                                <input type="text" class="form-control caja-input" id="viaje" name="viaje" placeholder="Vehiculo Propio">
                            </div>
                        </div>
                        <div id="direcciones">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="pais" class="label-form">Pais</label>
                                    <select class="form-select caja-input" onchange="Cargar_Estados()" id="pais" name="pais" aria-label="Default select example" required>
                                        <option value="">Seleccione el pais</option>

                                        <?php
                                        $sql = $database->prepare('SELECT * FROM tablpais');
                                        $sql->execute();
                                        $paises = $sql->get_result();
                                        $sql->close();

                                        $html = "";
                                        while ($pais = $paises->fetch_assoc()) {
                                            $html .= '<option value="' . $pais['paiscodg'] . '">' . $pais['paisnomb'] . '</option>';
                                        };

                                        echo $html;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="estado" class="label-form">Estado</label>
                                    <select class="form-select caja-input" id="estado" onchange="Cargar_Municipios()" name="estado" aria-label="Default select example" required>
                                        <option value="">Seleccione el estado</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="municipio" class="label-form">Municipio</label>
                                    <select class="form-select caja-input" id="municipio" onchange="Cargar_Ciudades()" name="municipio" aria-label="Default select example" required>
                                        <option value="">Seleccione el municipio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="ciudad" class="label-form">Ciudad</label>
                                    <select class="form-select caja-input" onchange="Cargar_Parroquias()" id="ciudad" name="ciudad" aria-label="Default select example" required>
                                        <option value="">Seleccione la ciudad</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="parroquia" class="label-form">Parroquia</label>
                                    <select class="form-select caja-input" id="parroquia" name="parroquia" aria-label="Default select example" required>
                                        <option value="">Seleccione la parroquia</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="direccion" class="label-form">Dirección</label>
                                    <textarea class="form-control caja-input" id="direccion" name="direccion" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="validacion">
                            <div class="alert alerta alert-danger" role="alert">La contraseña es incorrecta</div>
                            <button type="submit" class="btn boton btn-success mb-2" name="btn">Registrar</button>
                        </div>
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