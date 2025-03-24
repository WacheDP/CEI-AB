<?php
require "../php/basedatos.php";

function Cargar_Respuesta($señales)
{
    $html = "";

    if (!$señales['cedula'] && !$señales['usuario'] && !$señales['correo'] && !$señales['fecha']) {
        $html .= '<input type="submit" class="boton btn btn-success" name="btn" value="Registrar">';
    } else {
        $html .= '<div class="alert alert-danger alerta" role="alert">';

        if ($señales['cedula']) {
            $html .= '<p>La cedula ya existe</p>';
        }

        if ($señales['usuario']) {
            $html .= '<p>El nombre de usuario ya existe</p>';
        }

        if ($señales['correo']) {
            $html .= '<p>El correo electrónico ya existe</p>';
        }

        if ($señales['fecha']) {
            $html .= '<p>La fecha de nacimiento no es válida</p>';
        }

        $html .= '</div>';
    };

    return $html;
};

$cedula = $_POST['cedula'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$fecha = $_POST['nacimiento'];
$respuesta = "";

if (!empty($cedula) && !empty($usuario) && !empty($correo) && !empty($fecha)) {
    $señales = ["cedula" => false, "usuario" => false, "correo" => false, "fecha" => false];

    $sql = $database->prepare('SELECT p.perscedi FROM tablpers AS p WHERE p.perscedi = ?');
    $sql->bind_param("s", $cedula);
    $sql->execute();
    $npersonas = $sql->get_result()->num_rows;
    $sql->close();

    if ($npersonas != 0) {
        $señales["cedula"] = true;
    };

    $sql = $database->prepare('SELECT u.username FROM tabluser AS u WHERE u.username = ?');
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $nusuarios = $sql->get_result()->num_rows;
    $sql->close();

    if ($nusuarios != 0) {
        $señales["usuario"] = true;
    };

    $sql = $database->prepare('SELECT u.username FROM tabluser AS u WHERE u.usercorr = ?');
    $sql->bind_param("s", $correo);
    $sql->execute();
    $ncorreos = $sql->get_result()->num_rows;
    $sql->close();

    if ($ncorreos != 0) {
        $señales["correo"] = true;
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
        $señales["fecha"] = true;
    };

    $respuesta = Cargar_Respuesta($señales);
};

Cerrar_Conexion($database);
echo $respuesta;
