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
    ?>

    <section id="inscripcion" class="section why-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Información del Nuevo Niño</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <form class="formulario" action="./inscribir_nuevo.php" method="post">
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

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="doctor" class="label-form">Pediatra</label>
                                <input type="text" class="form-control caja-input" id="doctor" name="doctor" placeholder="Dr. Gonzalos Blanco">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="label-form">¿El niño tiene alergias?</label>
                                <div class="opciones">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alergias" id="alergia_si" value="true" required>
                                        <label class="form-check-label" for="alergia_si">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="alergias" id="alergia_no" value="false" required>
                                        <label class="form-check-label" for="alergia_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="alergia_comida" class="label-form">Alergias a Comidas</label>
                                <textarea class="form-control caja-input" placeholder="Leche y sus derivados" id="alergia_comida" name="alergia_comida" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="alergia_medicina" class="label-form">Alergias a Medicinas</label>
                                <textarea class="form-control caja-input" placeholder="Oxacilina" id="alergia_medicina" name="alergia_medicina" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="label-form">¿El niño ha recibido atención médica?</label>
                                <div class="atenciones">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="atencion_medica" id="atencion_medica_si" value="true" required>
                                        <label class="form-check-label" for="atencion_medica_si">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="atencion_medica" id="atencion_medica_no" value="false" required>
                                        <label class="form-check-label" for="atencion_medica_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="limitaciones" class="label-form">¿El niño posee limitaciones físicas?</label>
                                <textarea class="form-control caja-input" id="limitaciones" name="limitaciones" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="label-form">¿El niño ha tenido convulsiones?</label>
                                <div class="convulsiones">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="convulsiones" id="convulsiones_si" value="true" required>
                                        <label class="form-check-label" for="convulsiones_si">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="convulsiones" id="convulsiones_no" value="false" required>
                                        <label class="form-check-label" for="convulsiones_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="convulsiones_razon" class="label-form">¿Porqué convulsionó el niño?</label>
                                <textarea class="form-control caja-input" id="convulsiones_razon" name="convulsiones_razon" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="" class="label-form">¿Recibirá el S.A.E.?</label>
                                <div class="sae">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sae" id="sae_si" value="true" required>
                                        <label class="form-check-label" for="sae_si">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sae" id="convulsiones_no" value="false" required>
                                        <label class="form-check-label" for="sae_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sae_razon" class="label-form">¿Porqué recibirá el S.A.E.?</label>
                                <textarea class="form-control caja-input" id="sae_razon" name="sae_razon" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="habitantes" class="label-form">¿Cuantas personas viven con el niño?</label>
                                <input class="form-control caja-input" placeholder="4" type="number" name="habitantes" id="habitantes" step="1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="turno_alterno" class="label-form">¿A cargo de quien queda el niño en el turno alterno?</label>
                                <textarea class="form-control caja-input" id="turno_alterno" name="turno_alterno" rows="3" required></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="deportes" class="label-form">¿Realiza el niño alguna actividad complementaria?</label>
                                <textarea class="form-control caja-input" id="deportes" name="deportes" rows="3"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fin_semana" class="label-form">¿Con quien comparte el niño el fin de semana?</label>
                                <textarea class="form-control caja-input" id="fin_semana" name="fin_semana" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group ">
                                <label for="observacion" class="observar">Observaciones</label>
                                <textarea class="form-control caja-input" id="observacion" name="observacion" rows="3"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn boton btn-success mb-2" name="btn">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
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