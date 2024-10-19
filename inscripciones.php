<!DOCTYPE html>
<html lang="es">

<?php
require "./php/clases.php";
session_start();
require "./php/filtro.php";

if ($_GET['sebo'] != 1) {
    header("Location: ./sistema.php");
    exit();
};

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
    <link rel="stylesheet" href="./estilos/inscripcion.css">
    <link rel="stylesheet" href="./estilos/inscrip_php.css">
    <link rel="stylesheet" href="./estilos/cabecera2.css">
    <link rel="stylesheet" href="./estilos/piepagina.css">

    <title>Inscribir Niño</title>
</head>

<body>
    <?php
    require "./php/conexion.php";

    date_default_timezone_set('America/Caracas');
    $hoy = date("Y-m-d");
    $sql = $conexion->prepare('SELECT añoescfin, añoesccod FROM abañoesc WHERE ? BETWEEN añoescini AND añoescfin;');
    $sql->bind_param("s", $hoy);
    $sql->execute();
    $final = $sql->get_result()->fetch_assoc();
    $sql->close();

    $codigo = $final['añoesccod'];
    $niño = $_SESSION['datos_niños'];
    $fecha = $niño['fechanacimiento'];
    list($year2, $mes2, $dia2) = explode("-", $final['añoescfin']);
    list($year, $mes, $dia) = explode("-", $fecha);

    $edad = $year2 - $year;

    $grupo = "";
    if ($edad <= 3) {
        $grupo = "MATERNAL";
    } else if ($edad > 3 && $edad <= 4) {
        $grupo = "A";
    } else if ($edad > 4 && $edad <= 5) {
        $grupo = "B";
    } else if ($edad > 5 && $edad <= 6) {
        $grupo = "C";
    };

    $sql = $conexion->prepare('SELECT a.aulanom, m.matcod, m.matturn, m.matgroup, m.matseccion FROM abaula AS a, abmat AS m WHERE m.matgroup = ? AND a.aulacod = m.aulacod;');
    $sql->bind_param("s", $grupo);
    $sql->execute();
    $clases = $sql->get_result();
    $sql->close();
    ?>

    <header><?php require "./php/menu_interior.php"; ?></header>

    <main>
        <h1>INSCRIPCIONES <?php echo $codigo; ?></h1>

        <?php
        $id = 1;
        while ($clase = $clases->fetch_assoc()):
        ?>
            <section class="<?php echo 'clases clases' . $id; ?>">
                <?php
                if ($id == 4) {
                    $id = 1;
                } else {
                    $id++;
                };
                ?>

                <div id="caja-izq">
                    <div class="info-class">
                        <h1>Información</h1>
                        <p>Aula: <?php echo $clase['aulanom']; ?></p>
                        <p>Grupo: <?php echo $clase['matgroup']; ?></p>
                        <p>Sección: <?php echo $clase['matseccion']; ?></p>
                        <p>Turno: <?php echo $clase['matturn']; ?></p>
                    </div>

                    <a href="<?php echo './php/inscribir_niños.php?sebo=1&codigo=' . $clase['matcod']; ?>">Inscribir</a>
                </div>

                <div id="caja-der">

                    <?php
                    $sql = $conexion->prepare('SELECT p.persnom1, p.persnom2, p.persapel1, p.persapel2, p.persfoto FROM abpers AS p, detmatperso as d WHERE d.matcod = ? AND d.persoci = p.persci');
                    $sql->bind_param("s", $clase['matcod']);
                    $sql->execute();
                    $profesores = $sql->get_result();
                    $sql->close();

                    while ($profe = $profesores->fetch_assoc()):
                    ?>

                        <div class="profe">
                            <img src="<?php echo './recursos/avatars/' . $profe['persfoto']; ?>" alt="Foto de Perfil">
                            <p>Nombres: <?php echo $profe['persnom1'] . ' ' . $profe['persnom2']; ?></p>
                            <p>Apellidos: <?php echo $profe['persapel1'] . ' ' . $profe['persapel2']; ?></p>
                        </div>

                    <?php
                    endwhile;
                    $profesores->free_result();
                    ?>

                </div>

            </section>
        <?php
        endwhile;
        $clases->free_result();
        ?>

    </main>

    <footer><?php require "./php/piepagina.php"; ?></footer>

    <!-- Javascripts -->
    <?php require "./php/cerrar_conexion.php"; ?>
    <script src="./js/menu2.js"></script>
</body>

</html>