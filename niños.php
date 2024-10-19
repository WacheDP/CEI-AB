<!DOCTYPE html>
<html lang="es">

<?php
require "./php/clases.php";
session_start();
require "./php/filtro.php";

if (empty($_SESSION['usuario'])) {
    header("Location: ./home.php");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Logo -->
    <link rel="shortcut icon" href="./recursos/lapiz.png" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="./estilos/niños.css">
    <link rel="stylesheet" href="./estilos/niñolist.css">
    <link rel="stylesheet" href="./estilos/cabecera2.css">
    <link rel="stylesheet" href="./estilos/piepagina.css">

    <title>C.E.I. Andrés Bello</title>
</head>

<body>
    <?php require "./php/conexion.php"; ?>

    <header><?php require "./php/menu_interior.php"; ?></header>

    <main>
        <?php
        date_default_timezone_set('America/Caracas');
        $hoy = date("Y-m-d");
        $sql = $conexion->prepare('SELECT cronograma.cracact FROM abcalesc AS dia, abcrac AS cronograma WHERE dia.calescdate = ? and dia.calesccod = cronograma.calesccod;');
        $sql->bind_param("s", $hoy);
        $sql->execute();
        $exe = $sql->get_result();
        $bandera = false;

        while ($actividad = $exe->fetch_assoc()) {
            if ($actividad['cracact'] == "INSCRIPCIONES") {
                $bandera = true;
                break;
            };
        };

        $exe->free_result();
        $sql->close();
        ?>

        <?php if ($bandera): ?>
            <section id="registro">
                <h1>Registrar al Sistema</h1>

                <div id="aviso">
                    <div>
                        <div id="cuadro-no-null"></div>
                        <p>Para los espacios que <b>NO</b> pueden quedar vacios en el formulario</p>
                    </div>
                    <div>
                        <div id="cuadro-null"></div>
                        <p>Para los espacios que pueden quedar vacios en el formulario</p>
                    </div>
                </div>

                <form action="./php/procesar_niños.php" method="post">
                    <div class="columnas">
                        <div>
                            <div class="partes">
                                <h4>Información del Parentezco</h4>
                                <label for="parentezco">Relación con el niño: </label>
                                <select name="parentezco" id="parentezco" class="no-null" required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="MADRE DEL NIÑO">Madre del Niño</option>
                                    <option value="PADRE DEL NIÑO">Padre del Niño</option>
                                    <option value="REPRESENTANTE LEGAL">Representante Legal</option>
                                </select>
                                <input type="checkbox" name="convivencia" id="convivencia">
                                <label for="convivencia">¿Vive con el niño?</label>
                            </div>

                            <div class="partes">
                                <h4>Información del Niño</h4>
                                <div>
                                    <label for="cedula-escolar">Cédula Escolar: </label>
                                    <input type="text" name="cedula-escolar" id="cedula-escolar" class="no-null" maxlength="15" placeholder="11478596321" required>
                                    <label for="sexo">Sexo: </label>
                                    <select name="sexo" id="sexo" class="no-null" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="nombre1">Primer Nombre: </label>
                                    <input type="text" name="nombre1" id="nombre1" class="no-null" maxlength="12" placeholder="Juan" required>
                                    <label for="nombre2">Segundo Nombre: </label>
                                    <input type="text" name="nombre2" id="nombre2" class="null" maxlength="12" placeholder="David">
                                </div>
                                <div>
                                    <label for="apellido1">Primer Apellido: </label>
                                    <input type="text" name="apellido1" id="apellido1" class="no-null" maxlength="12" placeholder="García" required>
                                    <label for="apellido2">Segundo Apellido: </label>
                                    <input type="text" name="apellido2" id="apellido2" class="null" maxlength="12" placeholder="López">
                                </div>
                                <div>
                                    <label for="nacionalidad">Nacionalidad: </label>
                                    <select name="nacionalidad" id="nacionalidad" class="no-null" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="V">Venezolano</option>
                                        <option value="E">Extranjero</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="fechanacer">Fecha de Nacimiento: </label>
                                    <input type="date" name="fechanacer" id="fechanacer" class="no-null" required>
                                </div>
                                <div id="validacion-fecha"></div>
                                <div>
                                    <label for="lugarnacer">Lugar de Nacimiento: </label>
                                    <textarea name="lugarnacer" id="lugarnacer" class="null" maxlength="100" placeholder="San Cristóbal, Estado Táchira..."></textarea>
                                </div>
                                <div>
                                    <label for="transporte">Medios de Transporte: </label>
                                    <textarea name="transporte" id="transporte" class="null" maxlength="30" placeholder="Medios Propios"></textarea>
                                </div>
                            </div>

                            <div class="partes">
                                <h4>Información del Hogar</h4>
                                <div class="p">
                                    <p>Si la caja "¿Vive con el niño?" esta activa no es necesario hacer esta parte del formulario</p>
                                </div>
                                <div>
                                    <label for="pais">País: </label>
                                    <select class="cambio no-null" name="pais" id="pais1" required>
                                        <option value="">Seleccione una opción</option>

                                        <?php
                                        $sql = $conexion->prepare('SELECT * FROM abpais');
                                        $sql->execute();
                                        $paises = $sql->get_result();

                                        $html = "";
                                        while ($pais = $paises->fetch_assoc()) {
                                            $html .= '<option value="' . htmlspecialchars($pais['paiscod']) . '">' . htmlspecialchars($pais['paisnom']) . '</option>';
                                        };
                                        echo $html;

                                        $paises->free_result();
                                        $sql->close();
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="estado">Estado: </label>
                                    <select class="cambio no-null" name="estado" id="estado1" required>
                                        <option value="">Seleccione una opción</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="municipio">Municipio: </label>
                                    <select class="cambio no-null" name="municipio" id="municipio1" required>
                                        <option value="">Seleccione una opción</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="ciudad">Ciudad: </label>
                                    <select class="cambio no-null" name="ciudad" id="ciudad1" required>
                                        <option value="">Seleccione una opción</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="parroquia">Parroquia: </label>
                                    <select class="cambio no-null" name="parroquia" id="parroquia1" required>
                                        <option value="">Seleccione una opción</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="dir">Dirección: </label>
                                    <textarea class="cambio no-null" name="dir" id="dir" maxlength="100" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="partes">
                                <h4>Información Medica</h4>
                                <div>
                                    <label for="doctor">Nombre del Pediatra: </label>
                                    <input type="text" name="doctor" id="doctor" class="null" maxlength="50" placeholder="Doctor Agustín Nobles">
                                    <label for="#">¿El niño tiene alergias?: </label>
                                    <input type="radio" name="alergia-box" id="alergia-box-1" value="0" required>
                                    <label for="alergia-box-1">No</label>
                                    <input type="radio" name="alergia-box" id="alergia-box-2" value="1" required>
                                    <label for="alergia-box-2">Si</label>
                                </div>
                                <div class="p">
                                    <p>Si el niño presenta alergias, por favor específica, en caso contrario, ignore esta parte</p>
                                </div>
                                <div>
                                    <label for="alergia-food">¿A que comida es alérgico?: </label>
                                    <textarea name="alergia-food" id="alergia-food" class="null" maxlength="50" placeholder="Carnes procesadas, como tocino, chorizo, salchichas y fiambres"></textarea>
                                </div>
                                <div>
                                    <label for="alergica-medicina">¿A que medicina es alergico?: </label>
                                    <textarea name="alergica-medicina" id="alergica-medicina" class="null" maxlength="50" placeholder="Oxacilina, Acetaminofen, Paracetamol, etc..."></textarea>
                                </div>
                                <div>
                                    <label for="#">¿Ha recibido atención medica?: </label>
                                    <input type="radio" name="atencion-medica" id="atencion-medica-1" value="1">
                                    <label for="atencion-medica-1">Si</label>
                                    <input type="radio" name="atencion-medica" id="atencion-medica-2" value="0">
                                    <label for="atencion-medica-2">No</label>
                                </div>
                                <div>
                                    <label for="limitaciones">¿Presenta alguna limitación física?: </label>
                                    <textarea name="limitaciones" id="limitaciones" class="null" maxlength="50"></textarea>
                                </div>
                                <div>
                                    <label for="#">¿El niño ha convulsionado?: </label>
                                    <input type="radio" name="convulsion-check" id="convulsion-check-1" value="0" required>
                                    <label for="convulsion-check-1">No</label>
                                    <input type="radio" name="convulsion-check" id="convulsion-check-2" value="1" required>
                                    <label for="convulsion-check-2">Si</label>
                                </div>
                                <div>
                                    <label for="convulsion-text">¿Porque convulsionó el niño?: </label>
                                    <textarea name="convulsion-text" id="convulsion-text" class="null" maxlength="50"></textarea>
                                </div>
                                <div>
                                    <label for="#">¿Recibirá el S.A.E.?: </label>
                                    <input type="radio" name="sae-check" id="sae-check-1" value="0" required>
                                    <label for="sae-check-1">No</label>
                                    <input type="radio" name="sae-check" id="sae-check-2" value="1" required>
                                    <label for="sae-check-2">Si</label>
                                </div>
                                <div>
                                    <label for="sae-text">¿Porque recibirá el S.A.E.?: </label>
                                    <textarea name="sae-text" id="sae-text" class="null" maxlength="50"></textarea>
                                </div>
                                <div>
                                    <label for="numero-habitantes">¿Cuantas personas viven con el niño?: </label>
                                    <input type="number" name="numero-habitantes" id="numero-habitantes" class="no-null" placeholder="0" required>
                                </div>
                                <div>
                                    <label for="turno-alterno">¿A cargo de quien queda el niño en el turno alterno?: </label>
                                    <textarea name="turno-alterno" id="turno-alterno" class="no-null" maxlength="50" placeholder="Se queda con el padre y la madre en casa" required></textarea>
                                </div>
                                <div>
                                    <label for="deporte">¿Realiza el niño alguna actividad complementaria?: </label>
                                    <textarea name="deporte" id="deporte" class="null" maxlength="50" placeholder="practica natacion en las tardes"></textarea>
                                </div>
                                <div>
                                    <label for="fines-semanas">¿Con quien comparte el niño el fin de semana los espacios recreativos?: </label>
                                    <textarea name="fines-semanas" id="fines-semanas" class="null" maxlength="50" placeholder="Los fines de semana visita a los abuelos"></textarea>
                                </div>
                                <div>
                                    <label for="observacion">Observaciones del Niño: </label>
                                    <textarea name="observacion" id="observacion" class="null" maxlength="100"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="Registrar Niño" id="registro-btn" name="registro-btn">
                </form>
            </section>
        <?php endif; ?>

        <section id="listado"></section>

        <?php if ($nivel >= 8): ?>
            <section id="todo"></section>
        <?php endif; ?>
    </main>

    <footer><?php require "./php/piepagina.php"; ?></footer>

    <!-- Javascripts -->
    <?php require "./php/cerrar_conexion.php"; ?>

    <script>
        var cedula = "<?php echo $cedula; ?>";
        var tuniños = document.getElementById('listado');
        var niños = document.getElementById("todo");

        Cargar_TusNiños(0, 1);
        Cargar_TodosNiños(0, 1);

        function Cargar_TusNiños(offset, pos) {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "./php/tusniños.php?cedula=" + encodeURIComponent(cedula) + "&offset=" + encodeURIComponent(offset) + "&pos=" + encodeURIComponent(pos));

            ajax.onload = function() {
                tuniños.innerHTML = ajax.responseText;
            };

            ajax.send();
        };

        function Cargar_TodosNiños(offset, pos) {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "./php/todosniños.php?offset=" + encodeURIComponent(offset) + "&pos=" + encodeURIComponent(pos));

            ajax.onload = function() {
                niños.innerHTML = ajax.responseText;
            };

            ajax.send();
        };
    </script>

    <script src="./js/menu2.js"></script>
    <script src="./js/listadinamica.js"></script>
    <script src="./js/checkbox_niños.js"></script>
    <script src="./js/validar_niño.js"></script>
</body>

</html>