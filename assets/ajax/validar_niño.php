<?php
require "../php/basedatos.php";

$niño = $_POST['niño'];
$nacimiento = $_POST['nacimiento'];
$señales = ["niño" => false, "nacimiento" => false];
$html = "";

function Respuesta($señales)
{
    $exit = "";

    if (!$señales['nacimiento'] && !$señales['niño']) {
        $exit .= '<input type="submit" name="btn" class="btn boton btn-success mb-2" value="Registrar">';
    } else {
        $exit .= '<div class="alert alerta alert-danger" role="alert">';
        if ($señales['niño']) {
            $exit .= 'La cedula escolar ya existe <br>';
        };
        if ($señales['nacimiento']) {
            $exit .= 'No cuenta con la edad apropiada';
        };
        $exit .= '</div>';
    };

    return $exit;
};

if (!empty($niño) && !empty($nacimiento)) {
    $sql = $database->prepare('SELECT n.nñcedesc FROM tablniño AS n WHERE n.nñcedesc = ?');
    $sql->bind_param("s", $niño);
    $sql->execute();
    $cedulas = $sql->get_result()->num_rows;
    $sql->close();

    if ($cedulas != 0) {
        $señales['niño'] = true;
    };

    $sebo = false;
    date_default_timezone_set("America/Caracas");
    $fecha = DateTime::createFromFormat("Y-m-d", $nacimiento);
    $hoy = new DateTime();

    if ($fecha > $hoy) {
        $sebo = true;
    };

    $edad = $hoy->diff($fecha)->y;

    if ($edad < 1 || $edad >= 6) {
        $sebo = true;
    };

    if ($sebo) {
        $señales['nacimiento'] = true;
    };

    $html = Respuesta($señales);
};

Cerrar_Conexion($database);
echo $html;
