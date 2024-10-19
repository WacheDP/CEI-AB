<!DOCTYPE html>
<html lang="es">

<?php
require "./php/clases.php";
session_start();
require "./php/filtro.php";

if (empty($_SESSION['usuario'])) {
    header("Location: ./home.php");
    exit();
};
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Logo -->
    <link rel="shortcut icon" href="./recursos/lapiz.png" type="image/x-icon">

    <!-- Estilos -->
    <link rel="stylesheet" href="./estilos/planificacion.css">
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
        $sql = $conexion->prepare('SELECT * FROM abañoesc WHERE ? BETWEEN añoescini AND añoescfin;');
        $sql->bind_param("s", $hoy);
        $sql->execute();
        $fechas = $sql->get_result();
        $bandera = false;

        $inicio = "";
        $fin = "";
        if ($fechas->num_rows != 0) {
            $bandera = true;
            $fecha = $fechas->fetch_assoc();
            $añoescolar = $fecha['añoesccod'];
            $inicio = $fecha['añoescini'];
            $fin = $fecha['añoescfin'];
        };

        $fechas->free_result();
        $sql->close();

        $sql = $conexion->prepare('SELECT acto.craccod FROM abcalesc AS dia, abcrac AS acto WHERE dia.calescdate = ? AND acto.cracact = "ORGANIZACION DE DOCENTES POR GRUPO Y SECCIONES" AND acto.calesccod = dia.calesccod;');
        $sql->bind_param("s", $hoy);
        $sql->execute();
        $actividades = $sql->get_result()->num_rows;
        $bandera2 = false;

        if ($actividades != 0) {
            $bandera2 = true;
        };

        $sql->close();
        ?>

        <?php if (!$bandera): ?>
            <section id="escolaryear">
                <h1>AÑO ESCOLAR</h1>

                <form action="./php/procesar_añoescolar.php" method="post">
                    <div class="inputs">
                        <div>
                            <label for="inicio">Inicio del Año Escolar: </label>
                            <input type="date" name="inicio" id="inicio" required>
                        </div>
                        <div>
                            <label for="final">Fin del Año Escolar: </label>
                            <input type="date" name="final" id="final" required>
                        </div>
                    </div>

                    <input type="submit" value="Registrar Año Escolar" name="btn">
                </form>
            </section>
        <?php endif; ?>

        <?php if ($bandera): ?>
            <section id="escolaryear">
                <h1>AÑO ESCOLAR <?php echo $añoescolar; ?></h1>

                <form action="./php/alterar_añoescolar.php" method="post">
                    <div class="inputs">
                        <div>
                            <label for="inicio">Inicio del Año Escolar: </label>
                            <input type="date" name="inicio" id="inicio" value="<?php echo $inicio; ?>">
                        </div>
                        <div>
                            <label for="final">Fin del Año Escolar: </label>
                            <input type="date" name="final" id="final" value="<?php echo $fin; ?>">
                        </div>
                    </div>

                    <input type="submit" value="Actualizar Año Escolar" name="btn">
                </form>
            </section>
        <?php endif; ?>

        <?php if ($bandera2): ?>
            <section id="planestudio">

                <h1>ORGANIZAR DOCENTES-X-SALÓN <?php echo $añoescolar; ?></h1>
                <form action="./php/procesar_matriculas.php" method="post">

                    <div id="plan1" class="planes">
                        <div class="selectos">
                            <div>
                                <label for="salon1">Salón: </label>
                                <select name="salon1" id="salon1">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare("SELECT aula.aulacod, aula.aulanom FROM abaula AS aula INNER JOIN (SELECT aulacod, MAX(dauladate) AS max_date FROM detaula GROUP BY aulacod) AS max_dates ON aula.aulacod = max_dates.aulacod INNER JOIN detaula AS det ON aula.aulacod = det.aulacod AND det.dauladate = max_dates.max_date WHERE aula.aulanom LIKE '%Aula%' AND det.daulastatus = 1;");
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($aula = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . $aula['aulacod'] . '">' . $aula['aulanom'] . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="turno1">Turno: </label>
                                <select name="turno1" id="turno1">
                                    <option value="">Seleccione una opción</option>
                                    <option value="MAÑANA">Mañana</option>
                                    <option value="TARDE">Tarde</option>
                                </select>
                            </div>
                            <div>
                                <label for="grupo1">Grupo: </label>
                                <select name="grupo1" id="grupo1">
                                    <option value="">Seleccione una opción</option>
                                    <option value="MATERNAL">Maternal</option>
                                    <option value="A">Grupo A</option>
                                    <option value="B">Grupo B</option>
                                    <option value="C">Grupo C</option>
                                </select>
                            </div>
                        </div>
                        <div class="profes">
                            <div id="profes11">
                                <label for="docentes11">Docentes del nivel: </label>
                                <select name="docentes11" id="docentes11">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare('SELECT p.persci, p.persnom1, p.persapel1 FROM abpers AS p INNER JOIN abuser AS u ON u.persci = p.persci WHERE p.perscatg = "PERSONAL" AND u.usersecure = 3;');
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($profe = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . htmlspecialchars($profe['persci']) . '">' . htmlspecialchars($profe['persnom1']) . ' ' . htmlspecialchars($profe['persapel1']) . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                            <div id="profes12">
                                <label for="docentes12">Docentes del nivel: </label>
                                <select name="docentes12" id="docentes12">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare('SELECT p.persci, p.persnom1, p.persapel1 FROM abpers AS p INNER JOIN abuser AS u ON u.persci = p.persci WHERE p.perscatg = "PERSONAL" AND u.usersecure = 3;');
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($profe = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . htmlspecialchars($profe['persci']) . '">' . htmlspecialchars($profe['persnom1']) . ' ' . htmlspecialchars($profe['persapel1']) . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="botones2">
                            <h2>Agregar Docentes</h2>
                            <button id="prof-btn11" class="mas" type="button" onclick="Aumentar_Profesores(1);">+</button>
                            <button id="prof-btn12" class="menos" type="button" onclick="Quitar_Profesores(1);">-</button>
                        </div>
                    </div>


                    <div id="plan2" class="planes">
                        <div class="selectos">
                            <div>
                                <label for="salon2">Salón: </label>
                                <select name="salon2" id="salon2">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare("SELECT aula.aulacod, aula.aulanom FROM abaula AS aula INNER JOIN (SELECT aulacod, MAX(dauladate) AS max_date FROM detaula GROUP BY aulacod) AS max_dates ON aula.aulacod = max_dates.aulacod INNER JOIN detaula AS det ON aula.aulacod = det.aulacod AND det.dauladate = max_dates.max_date WHERE aula.aulanom LIKE '%Aula%' AND det.daulastatus = 1;");
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($aula = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . $aula['aulacod'] . '">' . $aula['aulanom'] . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="turno2">Turno: </label>
                                <select name="turno2" id="turno2">
                                    <option value="">Seleccione una opción</option>
                                    <option value="MAÑANA">Mañana</option>
                                    <option value="TARDE">Tarde</option>
                                </select>
                            </div>
                            <div>
                                <label for="grupo2">Grupo: </label>
                                <select name="grupo2" id="grupo2">
                                    <option value="">Seleccione una opción</option>
                                    <option value="MATERNAL">Maternal</option>
                                    <option value="A">Grupo A</option>
                                    <option value="B">Grupo B</option>
                                    <option value="C">Grupo C</option>
                                </select>
                            </div>
                        </div>
                        <div class="profes">
                            <div id="profes21">
                                <label for="docentes21">Docentes del nivel: </label>
                                <select name="docentes21" id="docentes21">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare('SELECT p.persci, p.persnom1, p.persapel1 FROM abpers AS p INNER JOIN abuser AS u ON u.persci = p.persci WHERE p.perscatg = "PERSONAL" AND u.usersecure = 3;');
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($profe = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . htmlspecialchars($profe['persci']) . '">' . htmlspecialchars($profe['persnom1']) . ' ' . htmlspecialchars($profe['persapel1']) . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                            <div id="profes22">
                                <label for="docentes22">Docentes del nivel: </label>
                                <select name="docentes22" id="docentes22">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare('SELECT p.persci, p.persnom1, p.persapel1 FROM abpers AS p INNER JOIN abuser AS u ON u.persci = p.persci WHERE p.perscatg = "PERSONAL" AND u.usersecure = 3;');
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($profe = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . htmlspecialchars($profe['persci']) . '">' . htmlspecialchars($profe['persnom1']) . ' ' . htmlspecialchars($profe['persapel1']) . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="botones2">
                            <h2>Agregar Docentes</h2>
                            <button id="prof-btn21" class="mas" type="button" onclick="Aumentar_Profesores(2);">+</button>
                            <button id="prof-btn22" class="menos" type="button" onclick="Quitar_Profesores(2);">-</button>
                        </div>
                    </div>


                    <div id="plan3" class="planes">
                        <div class="selectos">
                            <div>
                                <label for="salon3">Salón: </label>
                                <select name="salon3" id="salon3">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare("SELECT aula.aulacod, aula.aulanom FROM abaula AS aula INNER JOIN (SELECT aulacod, MAX(dauladate) AS max_date FROM detaula GROUP BY aulacod) AS max_dates ON aula.aulacod = max_dates.aulacod INNER JOIN detaula AS det ON aula.aulacod = det.aulacod AND det.dauladate = max_dates.max_date WHERE aula.aulanom LIKE '%Aula%' AND det.daulastatus = 1;");
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($aula = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . $aula['aulacod'] . '">' . $aula['aulanom'] . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="turno3">Turno: </label>
                                <select name="turno3" id="turno3">
                                    <option value="">Seleccione una opción</option>
                                    <option value="MAÑANA">Mañana</option>
                                    <option value="TARDE">Tarde</option>
                                </select>
                            </div>
                            <div>
                                <label for="grupo3">Grupo: </label>
                                <select name="grupo3" id="grupo3">
                                    <option value="">Seleccione una opción</option>
                                    <option value="MATERNAL">Maternal</option>
                                    <option value="A">Grupo A</option>
                                    <option value="B">Grupo B</option>
                                    <option value="C">Grupo C</option>
                                </select>
                            </div>
                        </div>
                        <div class="profes">
                            <div id="profes31">
                                <label for="docentes31">Docentes del nivel: </label>
                                <select name="docentes31" id="docentes31">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare('SELECT p.persci, p.persnom1, p.persapel1 FROM abpers AS p INNER JOIN abuser AS u ON u.persci = p.persci WHERE p.perscatg = "PERSONAL" AND u.usersecure = 3;');
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($profe = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . htmlspecialchars($profe['persci']) . '">' . htmlspecialchars($profe['persnom1']) . ' ' . htmlspecialchars($profe['persapel1']) . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                            <div id="profes32">
                                <label for="docentes32">Docentes del nivel: </label>
                                <select name="docentes32" id="docentes32">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare('SELECT p.persci, p.persnom1, p.persapel1 FROM abpers AS p INNER JOIN abuser AS u ON u.persci = p.persci WHERE p.perscatg = "PERSONAL" AND u.usersecure = 3;');
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($profe = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . htmlspecialchars($profe['persci']) . '">' . htmlspecialchars($profe['persnom1']) . ' ' . htmlspecialchars($profe['persapel1']) . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="botones2">
                            <h2>Agregar Docentes</h2>
                            <button id="prof-btn31" class="mas" type="button" onclick="Aumentar_Profesores(3);">+</button>
                            <button id="prof-btn32" class="menos" type="button" onclick="Quitar_Profesores(3);">-</button>
                        </div>
                    </div>


                    <div id="plan4" class="planes">
                        <div class="selectos">
                            <div>
                                <label for="salon4">Salón: </label>
                                <select name="salon4" id="salon4">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare("SELECT aula.aulacod, aula.aulanom FROM abaula AS aula INNER JOIN (SELECT aulacod, MAX(dauladate) AS max_date FROM detaula GROUP BY aulacod) AS max_dates ON aula.aulacod = max_dates.aulacod INNER JOIN detaula AS det ON aula.aulacod = det.aulacod AND det.dauladate = max_dates.max_date WHERE aula.aulanom LIKE '%Aula%' AND det.daulastatus = 1;");
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($aula = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . $aula['aulacod'] . '">' . $aula['aulanom'] . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="turno4">Turno: </label>
                                <select name="turno4" id="turno4">
                                    <option value="">Seleccione una opción</option>
                                    <option value="MAÑANA">Mañana</option>
                                    <option value="TARDE">Tarde</option>
                                </select>
                            </div>
                            <div>
                                <label for="grupo4">Grupo: </label>
                                <select name="grupo4" id="grupo4">
                                    <option value="">Seleccione una opción</option>
                                    <option value="MATERNAL">Maternal</option>
                                    <option value="A">Grupo A</option>
                                    <option value="B">Grupo B</option>
                                    <option value="C">Grupo C</option>
                                </select>
                            </div>
                        </div>
                        <div class="profes">
                            <div id="profes41">
                                <label for="docentes41">Docentes del nivel: </label>
                                <select name="docentes41" id="docentes41">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare('SELECT p.persci, p.persnom1, p.persapel1 FROM abpers AS p INNER JOIN abuser AS u ON u.persci = p.persci WHERE p.perscatg = "PERSONAL" AND u.usersecure = 3;');
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($profe = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . htmlspecialchars($profe['persci']) . '">' . htmlspecialchars($profe['persnom1']) . ' ' . htmlspecialchars($profe['persapel1']) . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                            <div id="profes42">
                                <label for="docentes42">Docentes del nivel: </label>
                                <select name="docentes42" id="docentes42">
                                    <option value="">Seleccione una opción</option>

                                    <?php
                                    $sql = $conexion->prepare('SELECT p.persci, p.persnom1, p.persapel1 FROM abpers AS p INNER JOIN abuser AS u ON u.persci = p.persci WHERE p.perscatg = "PERSONAL" AND u.usersecure = 3;');
                                    $sql->execute();
                                    $exe = $sql->get_result();

                                    $html = "";
                                    while ($profe = $exe->fetch_assoc()) {
                                        $html .= '<option value="' . htmlspecialchars($profe['persci']) . '">' . htmlspecialchars($profe['persnom1']) . ' ' . htmlspecialchars($profe['persapel1']) . '</option>';
                                    };

                                    echo $html;

                                    $exe->free_result();
                                    $sql->close();
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="botones2">
                            <h2>Agregar Docentes</h2>
                            <button id="prof-btn41" class="mas" type="button" onclick="Aumentar_Profesores(4);">+</button>
                            <button id="prof-btn42" class="menos" type="button" onclick="Quitar_Profesores(4);">-</button>
                        </div>
                    </div>


                    <div class="botones1">
                        <h2>Agregar Clases</h2>
                        <button id="class-btn1" class="mas" type="button" onclick="Aumentar_Planes(2);">+</button>
                        <button id="class-btn2" class="mas" type="button" onclick="Aumentar_Planes(3);">+</button>
                        <button id="class-btn3" class="menos" type="button" onclick="Quitar_Planes(1);">-</button>
                        <button id="class-btn4" class="mas" type="button" onclick="Aumentar_Planes(4);">+</button>
                        <button id="class-btn5" class="menos" type="button" onclick="Quitar_Planes(2);">-</button>
                        <button id="class-btn6" class="menos" type="button" onclick="Quitar_Planes(3);">-</button>
                    </div>

                    <input type="submit" value="Registrar docentes/aulas" name="plan-btn">
                </form>
            </section>
        <?php endif; ?>

        <?php if ($bandera): ?>
            <section id="cronograma">
                <h1>CRONOGRAMA DE ACTIVIDADES <?php echo $añoescolar; ?></h1>
                <form action="./php/procesar_actividades.php" method="post">

                    <div id="num-act1" class="contenedor-form">
                        <div class="actividades">
                            <div>
                                <label for="actividad1">Actividad: </label>
                                <select name="actividad1" id="actividad1">
                                    <option value="">Seleccione una opción</option>
                                    <option value="ORGANIZACION DE DOCENTES POR GRUPO Y SECCIONES">Organización de Docentes por grupo y secciones</option>
                                    <option value="INSCRIPCIONES">Inscripciones</option>
                                    <option value="OTRO">Otras</option>
                                </select>
                            </div>
                            <div>
                                <label for="otra-actividad1">Especifique que actividad: </label>
                                <div>
                                    <textarea name="otra-actividad1" id="otra-actividad1" placeholder="Especifique la actividad"></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="fechas" class="tiempos">
                            <div id="div11">
                                <label for="fecha-actividad11">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad11" id="fecha-actividad11">
                            </div>
                            <div id="div12">
                                <label for="fecha-actividad12">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad12" id="fecha-actividad12">
                            </div>
                            <div id="div13">
                                <label for="fecha-actividad13">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad13" id="fecha-actividad13">
                            </div>
                            <div id="div14">
                                <label for="fecha-actividad14">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad14" id="fecha-actividad14">
                            </div>
                            <div id="div15">
                                <label for="fecha-actividad15">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad15" id="fecha-actividad15">
                            </div>
                        </div>

                        <div class="botones2">
                            <h2>Agregar Fechas</h2>
                            <button id="time-btn11" class="mas" type="button" onclick="Aumentar_Fechas(1, 2);">+</button>
                            <button id="time-btn12" class="mas" type="button" onclick="Aumentar_Fechas(1, 3);">+</button>
                            <button id="time-btn13" class="menos" type="button" onclick="Quitar_Fechas(1, 1);">-</button>
                            <button id="time-btn14" class="mas" type="button" onclick="Aumentar_Fechas(1, 4);">+</button>
                            <button id="time-btn15" class="menos" type="button" onclick="Quitar_Fechas(1, 2);">-</button>
                            <button id="time-btn16" class="mas" type="button" onclick="Aumentar_Fechas(1, 5);">+</button>
                            <button id="time-btn17" class="menos" type="button" onclick="Quitar_Fechas(1, 3);">-</button>
                            <button id="time-btn18" class="menos" type="button" onclick="Quitar_Fechas(1, 4);">-</button>
                        </div>
                    </div>

                    <div id="num-act2" class="contenedor-form">
                        <div class="actividades">
                            <div>
                                <label for="actividad2">Actividad: </label>
                                <select name="actividad2" id="actividad2">
                                    <option value="">Seleccione una opción</option>
                                    <option value="ORGANIZACION DE DOCENTES POR GRUPO Y SECCIONES">Organización de Docentes por grupo y secciones</option>
                                    <option value="INSCRIPCIONES">Inscripciones</option>
                                    <option value="OTRO">Otras</option>
                                </select>
                            </div>
                            <div>
                                <label for="otra-actividad2">Especifique que actividad: </label>
                                <div>
                                    <textarea name="otra-actividad2" id="otra-actividad2" placeholder="Especifique la actividad"></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="fechas" class="tiempos">
                            <div id="div21">
                                <label for="fecha-actividad21">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad21" id="fecha-actividad21">
                            </div>
                            <div id="div22">
                                <label for="fecha-actividad22">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad22" id="fecha-actividad22">
                            </div>
                            <div id="div23">
                                <label for="fecha-actividad23">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad23" id="fecha-actividad23">
                            </div>
                            <div id="div24">
                                <label for="fecha-actividad24">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad24" id="fecha-actividad24">
                            </div>
                            <div id="div25">
                                <label for="fecha-actividad25">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad25" id="fecha-actividad25">
                            </div>
                        </div>

                        <div class="botones2">
                            <h2>Agregar Fechas</h2>
                            <button id="time-btn21" class="mas" type="button" onclick="Aumentar_Fechas(2, 2);">+</button>
                            <button id="time-btn22" class="mas" type="button" onclick="Aumentar_Fechas(2, 3);">+</button>
                            <button id="time-btn23" class="menos" type="button" onclick="Quitar_Fechas(2, 1);">-</button>
                            <button id="time-btn24" class="mas" type="button" onclick="Aumentar_Fechas(2, 4);">+</button>
                            <button id="time-btn25" class="menos" type="button" onclick="Quitar_Fechas(2, 2);">-</button>
                            <button id="time-btn26" class="mas" type="button" onclick="Aumentar_Fechas(2, 5);">+</button>
                            <button id="time-btn27" class="menos" type="button" onclick="Quitar_Fechas(2, 3);">-</button>
                            <button id="time-btn28" class="menos" type="button" onclick="Quitar_Fechas(2, 4);">-</button>
                        </div>
                    </div>

                    <div id="num-act3" class="contenedor-form">
                        <div class="actividades">
                            <div>
                                <label for="actividad3">Actividad: </label>
                                <select name="actividad3" id="actividad3">
                                    <option value="">Seleccione una opción</option>
                                    <option value="ORGANIZACION DE DOCENTES POR GRUPO Y SECCIONES">Organización de Docentes por grupo y secciones</option>
                                    <option value="INSCRIPCIONES">Inscripciones</option>
                                    <option value="OTRO">Otras</option>
                                </select>
                            </div>
                            <div>
                                <label for="otra-actividad3">Especifique que actividad: </label>
                                <div>
                                    <textarea name="otra-actividad3" id="otra-actividad3" placeholder="Especifique la actividad"></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="fechas" class="tiempos">
                            <div id="div31">
                                <label for="fecha-actividad31">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad31" id="fecha-actividad31">
                            </div>
                            <div id="div32">
                                <label for="fecha-actividad32">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad32" id="fecha-actividad32">
                            </div>
                            <div id="div33">
                                <label for="fecha-actividad33">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad33" id="fecha-actividad33">
                            </div>
                            <div id="div34">
                                <label for="fecha-actividad34">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad34" id="fecha-actividad34">
                            </div>
                            <div id="div35">
                                <label for="fecha-actividad35">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad35" id="fecha-actividad35">
                            </div>
                        </div>

                        <div class="botones2">
                            <h2>Agregar Fechas</h2>
                            <button id="time-btn31" class="mas" type="button" onclick="Aumentar_Fechas(3, 2);">+</button>
                            <button id="time-btn32" class="mas" type="button" onclick="Aumentar_Fechas(3, 3);">+</button>
                            <button id="time-btn33" class="menos" type="button" onclick="Quitar_Fechas(3, 1);">-</button>
                            <button id="time-btn34" class="mas" type="button" onclick="Aumentar_Fechas(3, 4);">+</button>
                            <button id="time-btn35" class="menos" type="button" onclick="Quitar_Fechas(3, 2);">-</button>
                            <button id="time-btn36" class="mas" type="button" onclick="Aumentar_Fechas(3, 5);">+</button>
                            <button id="time-btn37" class="menos" type="button" onclick="Quitar_Fechas(3, 3);">-</button>
                            <button id="time-btn38" class="menos" type="button" onclick="Quitar_Fechas(3, 4);">-</button>
                        </div>
                    </div>

                    <div id="num-act4" class="contenedor-form">
                        <div class="actividades">
                            <div>
                                <label for="actividad4">Actividad: </label>
                                <select name="actividad4" id="actividad4">
                                    <option value="">Seleccione una opción</option>
                                    <option value="INSCRIPCIONES">Inscripciones</option>
                                    <option value="OTRO">Otras</option>
                                </select>
                            </div>
                            <div>
                                <label for="otra-actividad4">Especifique que actividad: </label>
                                <div>
                                    <textarea name="otra-actividad4" id="otra-actividad4" placeholder="Especifique la actividad"></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="fechas" class="tiempos">
                            <div id="div41">
                                <label for="fecha-actividad41">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad41" id="fecha-actividad41">
                            </div>
                            <div id="div42">
                                <label for="fecha-actividad42">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad42" id="fecha-actividad42">
                            </div>
                            <div id="div43">
                                <label for="fecha-actividad43">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad43" id="fecha-actividad43">
                            </div>
                            <div id="div44">
                                <label for="fecha-actividad44">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad44" id="fecha-actividad44">
                            </div>
                            <div id="div45">
                                <label for="fecha-actividad45">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad45" id="fecha-actividad45">
                            </div>
                        </div>

                        <div class="botones2">
                            <h2>Agregar Fechas</h2>
                            <button id="time-btn41" class="mas" type="button" onclick="Aumentar_Fechas(4, 2);">+</button>
                            <button id="time-btn42" class="mas" type="button" onclick="Aumentar_Fechas(4, 3);">+</button>
                            <button id="time-btn43" class="menos" type="button" onclick="Quitar_Fechas(4, 1);">-</button>
                            <button id="time-btn44" class="mas" type="button" onclick="Aumentar_Fechas(4, 4);">+</button>
                            <button id="time-btn45" class="menos" type="button" onclick="Quitar_Fechas(4, 2);">-</button>
                            <button id="time-btn46" class="mas" type="button" onclick="Aumentar_Fechas(4, 5);">+</button>
                            <button id="time-btn47" class="menos" type="button" onclick="Quitar_Fechas(4, 3);">-</button>
                            <button id="time-btn48" class="menos" type="button" onclick="Quitar_Fechas(4, 4);">-</button>
                        </div>
                    </div>

                    <div id="num-act5" class="contenedor-form">
                        <div class="actividades">
                            <div>
                                <label for="actividad5">Actividad: </label>
                                <select name="actividad5" id="actividad5">
                                    <option value="">Seleccione una opción</option>
                                    <option value="ORGANIZACION DE DOCENTES POR GRUPO Y SECCIONES">Organización de Docentes por grupo y secciones</option>
                                    <option value="INSCRIPCIONES">Inscripciones</option>
                                    <option value="OTRO">Otras</option>
                                </select>
                            </div>
                            <div>
                                <label for="otra-actividad5">Especifique que actividad: </label>
                                <div>
                                    <textarea name="otra-actividad5" id="otra-actividad5" placeholder="Especifique la actividad"></textarea>
                                </div>
                            </div>
                        </div>

                        <div id="fechas" class="tiempos">
                            <div id="div51">
                                <label for="fecha-actividad51">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad51" id="fecha-actividad51">
                            </div>
                            <div id="div52">
                                <label for="fecha-actividad52">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad52" id="fecha-actividad52">
                            </div>
                            <div id="div53">
                                <label for="fecha-actividad53">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad53" id="fecha-actividad53">
                            </div>
                            <div id="div54">
                                <label for="fecha-actividad54">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad54" id="fecha-actividad54">
                            </div>
                            <div id="div55">
                                <label for="fecha-actividad55">Fecha de la Actividad: </label>
                                <input type="date" name="fecha-actividad55" id="fecha-actividad55">
                            </div>
                        </div>

                        <div class="botones2">
                            <h2>Agregar Fechas</h2>
                            <button id="time-btn51" class="mas" type="button" onclick="Aumentar_Fechas(5, 2);">+</button>
                            <button id="time-btn52" class="mas" type="button" onclick="Aumentar_Fechas(5, 3);">+</button>
                            <button id="time-btn53" class="menos" type="button" onclick="Quitar_Fechas(5, 1);">-</button>
                            <button id="time-btn54" class="mas" type="button" onclick="Aumentar_Fechas(5, 4);">+</button>
                            <button id="time-btn55" class="menos" type="button" onclick="Quitar_Fechas(5, 2);">-</button>
                            <button id="time-btn56" class="mas" type="button" onclick="Aumentar_Fechas(5, 5);">+</button>
                            <button id="time-btn57" class="menos" type="button" onclick="Quitar_Fechas(5, 3);">-</button>
                            <button id="time-btn58" class="menos" type="button" onclick="Quitar_Fechas(5, 4);">-</button>
                        </div>
                    </div>

                    <div class="botones1">
                        <h2>Agregar Actividades</h2>
                        <button id="act-btn1" class="mas" type="button" onclick="Aumentar_Actividades(2);">+</button>
                        <button id="act-btn2" class="mas" type="button" onclick="Aumentar_Actividades(3);">+</button>
                        <button id="act-btn3" class="menos" type="button" onclick="Quitar_Actividades(1);">-</button>
                        <button id="act-btn4" class="mas" type="button" onclick="Aumentar_Actividades(4);">+</button>
                        <button id="act-btn5" class="menos" type="button" onclick="Quitar_Actividades(2);">-</button>
                        <button id="act-btn6" class="mas" type="button" onclick="Aumentar_Actividades(5);">+</button>
                        <button id="act-btn7" class="menos" type="button" onclick="Quitar_Actividades(3);">-</button>
                        <button id="act-btn8" class="menos" type="button" onclick="Quitar_Actividades(4);">-</button>
                    </div>

                    <input type="submit" value="Registrar Actividad" name="cronograma">
                </form>
            </section>
        <?php endif; ?>

    </main>

    <footer><?php require "./php/piepagina.php"; ?></footer>

    <!-- JavaScripts -->
    <?php require "./php/cerrar_conexion.php"; ?>
    <script src="./js/menu2.js"></script>
    <script src="./js/actividades_form.js"></script>
    <script src="./js/clases_form.js"></script>
</body>

</html>