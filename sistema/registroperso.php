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
    <link rel="stylesheet" href="../assets/css/registroperso.css">
    <link rel="stylesheet" href="../assets/css/cabecera2.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-grad-school-ext.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/lightbox.css">

    <title>C.E.I. Andrés Bello</title>
</head>

<body>
    <?php require "./navbar.php"; ?>

    <section id="registro" class="section why-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Registrar Miembro del Personal</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <form class="formulario" action="../assets/php/procesar_registroperso.php" method="post">
                        <div class="form-group row col-md-4">
                            <label for="CI" class="col-sm-2 col-form-label">Cedula</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control caja-input" id="CI" name="CI" placeholder="1345874" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nom1" class="label-input">Primer Nombre</label>
                                <input type="text" class="form-control caja-input" id="nom1" name="nom1" placeholder="Pedro" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nom2" class="label-input">Segundo Nombre</label>
                                <input type="text" class="form-control caja-input" id="nom2" name="nom2" placeholder="Antonio">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="ape1" class="label-input">Primer Apellido</label>
                                <input type="text" class="form-control caja-input" id="ape1" name="ape1" placeholder="Peréz" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ape2" class="label-input">Segundo Apellido</label>
                                <input type="text" class="form-control caja-input" id="ape2" name="ape2" placeholder="Ródriguez">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="telf1" class="label-input">Telefono 1</label>
                                <input type="text" class="form-control caja-input" id="telf1" name="telf1" placeholder="Peréz" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telf2" class="label-input">Telefono 2</label>
                                <input type="text" class="form-control caja-input" id="telf2" name="telf2" placeholder="Ródriguez">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="usuario" class="label-input">Nombre de Usuario</label>
                                <input type="text" class="form-control caja-input" id="usuario" name="usuario" placeholder="Usuario123" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="correo" class="label-input">Correo Electrónico</label>
                                <input type="email" class="form-control caja-input" id="correo" name="correo" placeholder="ejemplo@gmail.com" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="service" class="label-input">Tiempo de Servicio</label>
                                <input type="date" class="form-control caja-input" id="service" name="service" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cargo" class="label-input">Cargo</label>
                                <select class="form-control" id="cargo" name="cargo" required>
                                    <option value="">Seleccione el cargo</option>
                                    <?php
                                    $sql = $database->prepare('SELECT c.cargcodg, c.cargdenm FROM tblcargo AS c');
                                    $sql->execute();
                                    $cargos = $sql->get_result();
                                    $sql->close();

                                    $html = "";
                                    while ($cargo = $cargos->fetch_assoc()) {
                                        $html .= '<option value="' . $cargo['cargcodg'] . '">' . $cargo['cargcodg'] . ' - ' . $cargo['cargdenm'] . '</option>';
                                    };
                                    echo $html;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="nacionalidad" class="label-input">Nacionalidad</label>
                                <select class="form-control" id="nacionalidad" name="nacionalidad" required>
                                    <option value="">Seleccione la nacionalidad</option>
                                    <option value="V">Venezolano</option>
                                    <option value="E">Extranjero</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fecnac" class="label-input">Fecha de Nacimiento</label>
                                <input type="date" class="form-control caja-input" id="fecnac" name="fecnac" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lugnac" class="label-input">Lugar de Nacimiento</label>
                                <input type="text" class="form-control caja-input" id="lugnac" name="lugnac" placeholder="San Cristóbal, Estado Táchira">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="pais" class="label-input">Pais</label>
                                <select class="form-control caja-input" id="pais" name="pais" onchange="Cargar_Estados();" required>
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
                                <label for="estado" class="label-input">Estado</label>
                                <select class="form-control caja-input" id="estado" name="estado" onchange="Cargar_Municipios();" required>
                                    <option value="">Seleccione el estado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="municipio" class="label-input">Municipio</label>
                                <select class="form-control caja-input" id="municipio" name="municipio" onchange="Cargar_Ciudades();" required>
                                    <option value="">Seleccione el municipio</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="ciudad" class="label-input">Ciudad</label>
                                <select class="form-control caja-input" id="ciudad" name="ciudad" onchange="Cargar_Parroquias();" required>
                                    <option value="">Seleccione la ciudad</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="parroquia" class="label-input">Parroquia</label>
                                <select class="form-control caja-input" id="parroquia" name="parroquia" required>
                                    <option value="">Seleccione la parroquia</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="label-input">Dirección</label>
                            <textarea class="form-control caja-input" id="direccion" name="direccion" rows="3" required></textarea>
                        </div>

                        <div id="validacion"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <?php Cerrar_Conexion($database); ?>
    <script src="../assets/js/registro_perso.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>