<?php
require "./conexion.php";

$sebo = $_GET['sebo'];
$fecha = $_GET['date'];

if (!empty($fecha)) {
    list($year, $mes, $dia) = explode('-', $fecha);

    $html = "";
    if (checkdate($mes, $dia, $year)) {
        $hoy = date('Y');
        $lim1 = $hoy - 100;
        $lim2 = $hoy - 18;
        $limit = $hoy - 5;

        switch ($sebo) {
            case 0:
                if ($year > $lim2 || $year <= $lim1) {
                    $html .= '<div class="validacion">';
                    $html .= '<p>Esa edad no es válida...</p>';
                    $html .= '</div>';
                };
                break;

            case 1:
                if ($year < $limit) {
                    $html .= '<div class="validacion">';
                    $html .= '<p>Esa edad no es válida...</p>';
                    $html .= '</div>';
                };
                break;
        };
    } else {
        $html .= '<div class="validacion">';
        $html .= '<p>Esa edad no es válida 1...</p>';
        $html .= '</div>';
    };

    echo $html;
};

require "./cerrar_conexion.php";
