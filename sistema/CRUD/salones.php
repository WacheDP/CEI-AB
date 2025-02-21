<!DOCTYPE html>
<html lang="es">

<?php require "../validar_sesion.php"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Logo -->
    <link rel="shortcut icon" href="../../assets/lapiz.png" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="../../assets/css/inicio.css">
    <link rel="stylesheet" href="../../assets/css/salones.css">
    <link rel="stylesheet" href="../../assets/css/cabecera2.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
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

    <section id="salon" class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Salón</h2>
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
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $detalle = $_GET['detalle'];

                                $sql = $database->prepare('SELECT d.daulacod, a.aulanomb, d.dauladia, d.daulastt, d.daulaobv FROM detlaula AS d INNER JOIN tablaula AS a ON d.aulacodg = a.aulacodg WHERE d.daulacod = ?');
                                $sql->bind_param("s", $detalle);
                                $sql->execute();
                                $aula = $sql->get_result()->fetch_assoc();
                                $sql->close();

                                $html = "";
                                $n = 1;

                                $html .= '<tr>';
                                $html .= '<th scope="row">' . $n . '</th>';
                                $html .= '<td>' . $aula['aulanomb'] . '</td>';
                                $html .= '<td>' . $aula['dauladia'] . '</td>';
                                $html .= '<td>' . $aula['daulastt'] . '</td>';
                                $html .= '<td>' . $aula['daulaobv'] . '</td>';
                                $html .= '</tr>';

                                echo $html;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="edicion" class="section why-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Editar el Estado del Salón</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <form class="formulario" action="../../assets/php/editar_salones.php" method="post">
                        <input type="hidden" name="codigo" value="<?php echo $detalle; ?>">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="estado" class="label-input text-black">Nuevo Estado</label>
                                <select class="form-select" aria-label="Default select example" id="estado" name="estado" required>
                                    <option value="">Seleccione un Estado</option>
                                    <option value="Habilitado">Habilitado</option>
                                    <option value="Deshabilitado">Deshabilitado</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="razon" class="label-input text-black">Observación del Estado</label>
                                <textarea class="form-control texto" placeholder="XXXXX-XXXXX-XXXX" id="razon" name="razon" rows="3" maxlength="100"></textarea>
                            </div>
                        </div>

                        <input type="submit" class="btn boton btn-success" name="btn" value="Editar">
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- Scripts -->
<?php Cerrar_Conexion($database); ?>
<script src="../../assets/js/detalle_aula.js"></script>
<script src="../../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/video.js"></script>
<script src="assets/js/slick-slider.js"></script>
<script src="assets/js/custom.js"></script>

</html>