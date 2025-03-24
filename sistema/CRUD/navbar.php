<?php
$filtro = ["inscripcion" => false, "grupos&secciones" => false];

date_default_timezone_set("America/Caracas");
$hoy = date("Y-m-d");
$sql = $database->prepare('SELECT cro.crctacto FROM tbcroact AS cro, tbcalesc AS cal WHERE cro.clsccodg = cal.clsccodg AND cal.clscdate = ?');
$sql->bind_param("s", $hoy);
$sql->execute();
$actividades = $sql->get_result();
$sql->close();

while ($actos = $actividades->fetch_assoc()) {
    if ($actos['crctacto'] == "INSCRIPCIONES") {
        $filtro['inscripcion'] = true;
    };

    if ($actos['crctacto'] == "ORGANIZACIÓN DE GRUPOS Y SECCIONES") {
        $filtro['grupos&secciones'] = true;
    };
};
?>

<header class="main-header clearfix" role="header">
    <div class="logo">
        <img src="../../assets/images/niñoslapiz.png" alt="Logo de los niños">
        <a href="../inicio.php"><em>C.E.I.</em> Andrés Bello</a>
    </div>

    <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">

            <?php
            $html = "";
            if ($_SESSION['nivelseguridad'] >= 8) {
                $html .= '<li class="has-submenu"><a href="#">Planificación</a>';
                $html .= '<ul class="sub-menu">';
                $html .= '<li><a href="../planificacion.php">Actividades</a></li>';
                $html .= '<li><a href="#">Calendario</a></li>';

                if ($filtro['grupos&secciones']) {
                    $html .= '<li><a href="../grupos&secciones.php">Grupos</a></li>';
                }

                $html .= '</ul></li>';
            } else {
                $html .= '<li><a href="#">Calendario</a></li>';
            }
            echo $html;
            ?>

            <?php
            $html = "";
            if ($_SESSION['nivelseguridad'] == 3 || $_SESSION['nivelseguridad'] >= 6) {
                $html .= '<li class="has-submenu"><a href="#">Inventario</a>';
                $html .= '<ul class="sub-menu">';
                $html .= '<li><a href="../salones.php">Salones</a></li>';
                $html .= '</ul></li>';
            }
            echo $html;
            ?>

            <li class="has-submenu"><a href="#">Clases</a>
                <ul class="sub-menu"></ul>
            </li>

            <?php
            if ($_SESSION['nivelseguridad'] > 1) {
                $html = "";
                $html .= '<li class="has-submenu"><a href="#">Personal</a>';
                $html .= '<ul class="sub-menu">';

                if ($_SESSION['nivelseguridad'] >= 8) {
                    $html .= '<li><a href="../registroperso.php">Registrar</a></li>';
                }

                $html .= '</ul></li>';

                echo $html;
            };
            ?>

            <li class="has-submenu"><a href="#">Niños</a>
                <ul class="sub-menu">
                    <li><a href="#">Todos</a></li>
                    <li><a href="#">Niños</a></li>

                    <?php if ($filtro['inscripcion']) {
                        $html = "";
                        $html .= '<li><a href="../inscripciones.php">Inscribir</a></li>';
                        echo $html;
                    } ?>
                </ul>
            </li>

            <li><a href="#"><img class="foto" onclick="Abrir_Perfil();" src="<?php echo '../../assets/avatars/' . $_SESSION['perfil']; ?>" alt="Foto de Perfil"></a></li>
        </ul>
    </nav>

    <div id="perfil" class="card text-white bg-secondary">
        <img class="card-img-top" onclick="Cerrar_Perfil();" src="<?php echo '../../assets/avatars/' . $_SESSION['perfil']; ?>" alt="Foto de Perfil">
        <div class="card-body text-center">
            <h5 class="card-title"><?php echo 'Usuario <em>' . $_SESSION['usuario'] . '</em>'; ?></h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item card-text text-white bg-dark"><?php echo $_SESSION['categoria']; ?></li>
                <li class="list-group-item card-text text-white bg-dark"><?php echo 'Correo ' . $_SESSION['correo']; ?></li>
                <li class="list-group-item card-text text-white bg-dark"><?php echo 'Nivel de Seguridad ' . $_SESSION['nivelseguridad']; ?></li>
            </ul>
        </div>
        <div class="card-body">
            <a href="../../assets/php/cerrar_sesion.php" class="card-link">Cerrar Sesión</a>
        </div>
    </div>

    <script src="../../assets/js/menu.js"></script>
</header>