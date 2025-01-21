<?php
function Cargar_Respuesta($señales)
{
    $respuesta = "";

    if ($señales['usuario']) {
        $respuesta .= '<div class="alert alert-danger" role="alert">';
        $respuesta .= 'El nombre de usuario o el correo electrónico no existe</div>';
    } else {
        if ($señales['estado']) {
            $respuesta .= '<div class="alert alert-danger" role="alert">';
            $respuesta .= 'El usuario no está disponible</div>';
        };

        if ($señales['contraseña']) {
            $respuesta .= '<div class="alert alert-danger" role="alert">';
            $respuesta .= 'La contraseña es incorrecta</div>';
        };
    };

    if (!$señales['usuario'] && !$señales['estado'] && !$señales['contraseña']) {
        $respuesta .= '<button type="submit" class="btn btn-outline-success mb-2" name="btn">Ingresar</button>';
    };

    return $respuesta;
};

require "../php/basedatos.php";

$ID = $_POST['usuario'];
$clave = $_POST['password'];

if (!empty($ID) && !empty($clave)) {
    $señales = ["usuario" => false, "estado" => false, "contraseña" => false];

    $sql = $database->prepare('SELECT * FROM tabluser AS u WHERE u.username = ? OR u.usercorr = ?');
    $sql->bind_param("ss", $ID, $ID);
    $sql->execute();
    $result = $sql->get_result();
    $sql->close();

    if ($result->num_rows == 0) {
        $señales['usuario'] = true;
    } else {
        $result = $result->fetch_assoc();

        if ($result['userstat'] != "Habilitado") {
            $señales['estado'] = true;
        };

        if (!password_verify($clave, $result['userpawo'])) {
            $señales['contraseña'] = true;
        }
    };

    $respuesta = Cargar_Respuesta($señales);
} else {
    $respuesta = "";
};

Cerrar_Conexion($database);
echo $respuesta;
