<?php
require "./basedatos.php";

function Enviar_Correo($nombre, $cedula, $usuario, $contraseña, $receptor)
{
    $emisor = "wacheparra21@gmail.com";
    $asunto = "Reporte de Creación de Usuario";
    $header = "From: " . $emisor . "\r\n";
    $header .= "Reply-to: " . $emisor . "\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();

    $mensaje = "Reciba saludos cordiales, se ha reportado un registro de sesión dentro de la institución a su nombre, ";
    $mensaje .= "dicha cuenta tiene los datos de su cedula de identidad C.I." . $cedula;
    $mensaje .= " y tiene registrado su nombre " . $nombre . " \n\n";
    $mensaje .= "Para ingresar a la aplicacion solo ingrese a la pagina principal del C.E.I. Andrés Bello, ";
    $mensaje .= "para iniciar sesion se le hace entrega de sus datos: \n\n";
    $mensaje .= "Nombre de Usuario: " . $usuario . " \n Contraseña: " . $contraseña;

    mail($receptor, $asunto, $mensaje, $header);
}

function Crear_Contraseña()
{
    $caracteres_permitidos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longitud = 8;

    $contraseña = substr(str_shuffle(str_repeat($caracteres_permitidos, ceil($longitud / strlen($caracteres_permitidos)))), 0, $longitud);

    return $contraseña;
};

if (isset($_POST['btn'])) {
    $cedula = $_POST['CI'];
    $nombre1 = strtolower($_POST['nom1']);
    $nombre2 = strtolower($_POST['nom2']);
    $apellido1 = strtolower($_POST['ape1']);
    $apellido2 = strtolower($_POST['ape2']);
    $telefono1 = $_POST['telf1'];
    $telefono2 = $_POST['telf2'];
    $usuario = strtoupper($_POST['usuario']);
    $correo = strtolower($_POST['correo']);
    $clave = Crear_Contraseña();
    $contraseña = password_hash($clave, PASSWORD_DEFAULT);
    $nivel = 2;
    $servicio = $_POST['service'];
    $cargo = $_POST['cargo'];
    $nacionalidad = strtoupper($_POST['nacionalidad']);
    $fecha_nacer = $_POST['fecnac'];
    $lugar_nacer = $_POST['lugnac'];
    $parroquia = $_POST['parroquia'];
    $direccion = $_POST['direccion'];
    $full_name = $nombre1 . " " . $nombre2 . " " . $apellido1 . " " . $apellido2;

    $sql = $database->prepare('SELECT p.perscedi FROM tablpers AS p WHERE p.perscedi = ?');
    $sql->bind_param("s", $cedula);
    $sql->execute();
    $npersonas = $sql->get_result()->num_rows;
    $sql->close();

    $html = "";
    if ($npersonas != 0) {
        $html .= '<script>alert("La cedula ya está registrada...");';
        $html .= 'window.location.href="../../sistema/registroperso.php";</script>';
        echo $html;
        Cerrar_Conexion($database);
        exit;
    };

    $sql = $database->prepare('SELECT u.username FROM tabluser AS u WHERE u.username = ?');
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $nusuarios = $sql->get_result()->num_rows;
    $sql->close();

    if ($nusuarios != 0) {
        $html .= '<script>alert("El nombre de usuario ya existe...");';
        $html .= 'window.location.href="../../sistema/registroperso.php";</script>';
        echo $html;
        Cerrar_Conexion($database);
        exit;
    };

    $sql = $database->prepare('SELECT u.username FROM tabluser AS u WHERE u.usercorr = ?');
    $sql->bind_param("s", $correo);
    $sql->execute();
    $ncorreos = $sql->get_result()->num_rows;
    $sql->close();

    if ($ncorreos != 0) {
        $html .= '<script>alert("El correo electrónico ya existe...");';
        $html .= 'window.location.href="../../sistema/registroperso.php";</script>';
        echo $html;
        Cerrar_Conexion($database);
        exit;
    };

    $sebo = false;
    date_default_timezone_set("America/Caracas");
    $fecha = DateTime::createFromFormat('Y-m-d', $fecha_nacer);
    $fechaActual = new DateTime();

    if ($fecha > $fechaActual) {
        $sebo = true;
    }

    $edad = $fechaActual->diff($fecha)->y;

    if ($edad >= 100) {
        $sebo = true;
    }

    if ($sebo) {
        $html .= '<script>alert("La fecha de nacimiento no es válida...");';
        $html .= 'window.location.href="../../sistema/registroperso.php";</script>';
        echo $html;
        Cerrar_Conexion($database);
        exit;
    };

    $campos = [];
    $valores = [];

    $campos[] = "perscedi";
    $valores[] = $cedula;
    $campos[] = "parrqcod";
    $valores[] = $parroquia;
    $campos[] = "persnom1";
    $valores[] = $nombre1;

    if (!empty($nombre2)) {
        $campos[] = "persnom2";
        $valores[] = $nombre2;
    };

    $campos[] = "persape1";
    $valores[] = $apellido1;

    if (!empty($apellido2)) {
        $campos[] = "persape2";
        $valores[] = $apellido2;
    };

    if (!empty($telefono1)) {
        $campos[] = "perstel1";
        $valores[] = $telefono1;
    };

    if (!empty($telefono2)) {
        $campos[] = "perstel2";
        $valores[] = $telefono2;
    };

    $campos[] = "persfena";
    $valores[] = $fecha_nacer;

    if (!empty($lugar_nacer)) {
        $campos[] = "persluna";
        $valores[] = $lugar_nacer;
    };

    $campos[] = "persnaco";
    $valores[] = $nacionalidad;
    $campos[] = "persdire";
    $valores[] = $direccion;
    $campos[] = "perscatg";
    $valores[] = "PERSONAL";

    $camposstring = implode(", ", $campos);
    $interrogantes = implode(", ", array_fill(0, count($valores), '?'));
    $cadena = 'INSERT INTO tablpers(' . $camposstring . ') VALUES (' . $interrogantes . ')';
    $sql = $database->prepare($cadena);
    $sql->bind_param(str_repeat("s", count($valores)), ...$valores);
    $sql->execute();
    $sql->close();

    $sql = $database->prepare('INSERT INTO tabluser(username, perscedi, userpawo, usercorr, usercode) VALUES (?, ?, ?, ?, ?)');
    $sql->bind_param("ssssi", $usuario, $cedula, $contraseña, $correo, $nivel);
    $sql->execute();
    $sql->close();

    $sql = $database->prepare('INSERT INTO tabperso VALUES (?, ?, ?, ?)');
    $sql->bind_param("ssss", $cedula, $cedula, $cargo, $servicio);
    $sql->execute();
    $sql->close();

    Enviar_Correo($full_name, $cedula, $usuario, $clave, $correo);
};

Cerrar_Conexion($database);
header("Location: ../../sistema/registroperso.php");
exit;
