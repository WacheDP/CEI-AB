<section id="cabecera">
    <img src="./recursos/img/niñoslapiz.png" alt="Logo de la Institución" id="logo">

    <div id="menu">
        <nav id="info">
            <p><?php echo $id; ?></p>
            <p><?php echo $categoria; ?></p>
            <a href="./sistema.php">INICIO</a>
        </nav>

        <nav id="accion">
            <?php
            $html = "";
            if ($nivel > 8) {
                $html .= '<a href="./planificacion.php">Planificación</a>';
            };

            if ($nivel > 6) {
                $html .= '<a href="./inventario.php">Inventario</a>';
            };

            if ($nivel > 2) {
                $html .= '<a href="./clases.php">Clases</a>';
            };

            echo $html;
            ?>
            <a href="./calendario.php">Calendario</a>
            <a href="./niños.php">Niños</a>

        </nav>
    </div>

    <button id="perfil-btn-o" onclick="Activar();"><img src="<?php echo './recursos/avatars/' . $foto; ?>" alt="Foto de perfil"></button>

    <div id="perfil">
        <button id="perfil-btn-f" onclick="Apagar();"><img src="<?php echo './recursos/avatars/' . $foto; ?>" alt="Foto de perfil"></button>

        <div>
            <p class="titulos">Nombre de Usuario: </p>
            <p class="contenidos"><?php echo $nombreusuario; ?></p>
        </div>
        <div>
            <p class="titulos">Correo Electrónico: </p>
            <p class="contenidos"><?php echo $correo; ?></p>
        </div>
        <div>
            <p class="titulos">Nivel: </p>
            <div id="cuadro-nivel">
                <p><?php echo $nivel; ?></p>
            </div>
        </div>

        <a href="" id="cambio-perfil">Cambiar Foto de Perfil</a>
        <a href="">Cambiar Datos Personales</a>

        <?php
        $html = '';
        switch ($categoria) {
            case "PERSONAL":
                $html .= '<a href="">Cambiar Datos de Personal</a>';
                break;

            case "REPRESENTANTE":
                $html .= '<a href="">Cambiar Datos de Representante</a>';
                break;

            case "ADMINISTRADOR":
            case "REPRESENTANTE/PERSONAL":
                $html .= '<a href="">Cambiar Datos de Representante</a>';
                $html .= '<a href="">Cambiar Datos de Personal</a>';
                break;
        };
        echo $html;
        ?>

        <a href="">Cambiar Datos de Usuario</a>
        <a href="./php/cerrar_sesion.php">Cerrar Sesión</a>
    </div>
</section>