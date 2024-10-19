<?php
require "./conexion.php";

$offset = $_GET['offset'];
$pos = $_GET['pos'];

$html = "";
$cadena = 'SELECT n.niñociesc, n.niñonom1, n.niñonom2, n.niñoapel1, n.niñoapel2, n.niñosex, n.niñofoto, n.niñofecnac FROM abniño AS n GROUP BY n.niñociesc DESC';
$sql = $conexion->prepare($cadena);
$sql->execute();
$n = $sql->get_result()->num_rows;
$sql->close();

$cadena .= ' LIMIT 4 OFFSET ?';
$sql = $conexion->prepare($cadena);
$sql->bind_param("s", $offset);
$sql->execute();
$listado = $sql->get_result();
$sql->close();

if ($n > 1) {
    $html .= '<div id="all-niños">';
    $html .= '<h1>Todos los Niños</h1>';
    $html .= '<div id="niños">';

    while ($niño = $listado->fetch_assoc()) {
        $nombre = $niño['niñonom1'] . ' ' . $niño['niñonom2'] . ' ' . $niño['niñoapel1'] . ' ' . $niño['niñoapel2'];
        $foto = './recursos/avatars/' . $niño['niñofoto'];
        date_default_timezone_set("America/Caracas");
        $hoy = date("Y-m-d");
        list($y1, $m1, $d1) = explode("-", $niño['niñofecnac']);
        list($y2, $m2, $d2) = explode("-", $hoy);
        $edad = ($y2 - $y1) . ' años y ' . ($m2 - $m1) . ' meses';

        switch ($niño['niñosex']) {
            case "M":
                $html .= '<div class="niño">';
                $html .= '<img src="' . $foto . '" alt="Foto del Niño">';
                $html .= '<h6>Nombre: ' . $nombre . '</h6>';
                $html .= '<h6>Sexo: MASCULINO</h6>';
                $html .= '<h6>Edad: ' . $edad . '</h6>';
                $html .= '<div>';
                $html .= '<a href="#" class="ver">Información</a>';
                $html .= '<a href="#" class="editar">Editar</a>';
                $html .= '<a href="#" class="borrar">Eliminar</a>';
                $html .= '</div>';
                $html .= '</div>';
                break;

            case "F":
                $html .= '<div class="niña">';
                $html .= '<img src="' . $foto . '" alt="Foto del Niño">';
                $html .= '<h6>Nombre: ' . $nombre . '</h6>';
                $html .= '<h6>Sexo: FEMENINO</h6>';
                $html .= '<h6>Edad: ' . $edad . '</h6>';
                $html .= '<div>';
                $html .= '<a href="#" class="ver">Información</a>';
                $html .= '<a href="#" class="editar">Editar</a>';
                $html .= '<a href="#" class="borrar">Eliminar</a>';
                $html .= '</div>';
                $html .= '</div>';
                break;
        };
    };

    $html .= '</div>';

    $html .= '<nav id="niño-btn">';

    $botones = ceil($n / 4);

    if ($botones > 7) {
        if ($pos < 7) {
            $i = 1;
            $f = 7;
            $s = 1;
        } else if ($pos >= 7 && $pos < ($botones - 7)) {
            $i = $pos - 3;
            $f = $pos + 3;
            $s = 2;
        } else {
            $i = $pos - 4;
            $f = $botones;
            $s = 3;
        };
    } else {
        $i = 1;
        $f = $botones;
        $s = 0;
    };

    if ($s == 3 || $s == 2) {
        $html .= '<a>...</a>';
    };

    while ($i <= $f) {
        $paginador = 4 * ($i - 1);

        if ($i == $pos) {
            $html .= '<a id="pos" onclick="Cargar_TodosNiños(' . $paginador . ',' . $i . ');">' . $i . '</a>';
        } else {
            $html .= '<a onclick="Cargar_TodosNiños(' . $paginador . ',' . $i . ');">' . $i . '</a>';
        };

        $i++;
    };

    if ($s == 1 || $s == 2) {
        $html .= '<a>...</a>';
    };

    $html .= '</nav>';

    $html .= '</div>';
};

$listado->free_result();
echo $html;

require "./cerrar_conexion.php";
