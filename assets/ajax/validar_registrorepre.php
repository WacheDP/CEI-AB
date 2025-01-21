<?php
function cargar_respuesta($señales)
{
    $respuesta = "";

    if (!$señales["cedula"] && !$señales["usuario"] && !$señales["correo"] && !$señales["contraseñas"] && !$señales["fecha"]) {
        $respuesta .= '<button type="submit" name="btn" class="btn btn-outline-warning btn-lg boton">Registrar</button>';
    } else {
        $respuesta .= '<div class="alert alert-danger alerta" role="alert">';

        if ($señales["cedula"]) {
            $respuesta .= '<p>La cedula ya está registrada</p>';
        };

        if ($señales["usuario"]) {
            $respuesta .= '<p>El nombre de usuario ya existe</p>';
        };

        if ($señales["correo"]) {
            $respuesta .= '<p>El correo electrónico ya existe</p>';
        };

        if ($señales["contraseñas"]) {
            $respuesta .= '<p>Las contraseñas no son iguales</p>';
        };

        if ($señales["fecha"]) {
            $respuesta .= '<p>La fecha de nacimiento no es válida</p>';
        };

        $respuesta .= '</div>';
    };

    return $respuesta;
};

require "../php/basedatos.php";

$fecha = $_POST['fecha'];
$cedula = $_POST['cedula'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$verificacion = $_POST['verificacion'];

if (!empty($fecha) && !empty($cedula) && !empty($usuario) && !empty($correo) && !empty($contraseña) && !empty($verificacion)) {
    $señales = ["cedula" => false, "usuario" => false, "correo" => false, "contraseñas" => false, "fecha" => false];

    $sql = $database->prepare('SELECT p.perscedi FROM tablpers AS p WHERE p.perscedi = ?');
    $sql->bind_param("s", $cedula);
    $sql->execute();
    $npersonas = $sql->get_result()->num_rows;
    $sql->close();

    $html = "";
    if ($npersonas != 0) {
        $señales['cedula'] = true;
    };

    $sql = $database->prepare('SELECT u.username FROM tabluser AS u WHERE u.username = ?');
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $nusuarios = $sql->get_result()->num_rows;
    $sql->close();

    if ($nusuarios != 0) {
        $señales['usuario'] = true;
    };

    $sql = $database->prepare('SELECT u.username FROM tabluser AS u WHERE u.usercorr = ?');
    $sql->bind_param("s", $correo);
    $sql->execute();
    $ncorreos = $sql->get_result()->num_rows;
    $sql->close();

    if ($ncorreos != 0) {
        $señales['correo'] = true;
    };

    if ($contraseña != $verificacion) {
        $señales['contraseñas'] = true;
    };

    $sebo = false;
    date_default_timezone_set("America/Caracas");
    $fecha = DateTime::createFromFormat('Y-m-d', $fecha);
    $fechaActual = new DateTime();

    if ($fecha > $fechaActual) {
        $sebo = true;
    }

    $edad = $fechaActual->diff($fecha)->y;

    if ($edad >= 100) {
        $sebo = true;
    }

    if ($sebo) {
        $señales['fecha'] = true;
    };

    $respuesta = cargar_respuesta($señales);
} else {
    $respuesta = "";
};

Cerrar_Conexion($database);
echo $respuesta;
