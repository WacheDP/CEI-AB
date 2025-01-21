<?php
require "./basedatos.php";

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
    $contraseña = $_POST['contraseña'];
    $clave = password_hash($contraseña, PASSWORD_DEFAULT);
    $verificacion = $_POST['verificacion'];
    $fe = $_POST['fe'];
    $titulo = $_POST['titulo'];
    $trabajo = $_POST['trabajo'];
    $lugartrabajo = $_POST['lugartrabajo'];
    $nacionalidad = strtoupper($_POST['nacionalidad']);
    $fechanacimiento = $_POST['fecnac'];
    $lugarnacimiento = $_POST['lugnac'];
    $parroquia = $_POST['parroquia'];
    $direccion = $_POST['direccion'];

    $sql = $database->prepare('SELECT p.perscedi FROM tablpers AS p WHERE p.perscedi = ?');
    $sql->bind_param("s", $cedula);
    $sql->execute();
    $npersonas = $sql->get_result()->num_rows;
    $sql->close();

    $html = "";
    if ($npersonas != 0) {
        $html .= '<script>alert("La cedula ya está registrada...");';
        $html .= 'window.location.href="../../registrorepre.php";</script>';
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
        $html .= 'window.location.href="../../registrorepre.php";</script>';
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
        $html .= 'window.location.href="../../registrorepre.php";</script>';
        echo $html;
        Cerrar_Conexion($database);
        exit;
    };

    if ($contraseña != $verificacion) {
        $html .= '<script>alert("Las contraseñas no son iguales...");';
        $html .= 'window.location.href="../../registrorepre.php";</script>';
        echo $html;
        Cerrar_Conexion($database);
        exit;
    };

    $sebo = false;
    date_default_timezone_set("America/Caracas");
    $fecha = DateTime::createFromFormat('Y-m-d', $fechanacimiento);
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
        $html .= 'window.location.href="../../registrorepre.php";</script>';
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
    $valores[] = $fechanacimiento;

    if (!empty($lugarnacimiento)) {
        $campos[] = "persluna";
        $valores[] = $lugarnacimiento;
    };

    $campos[] = "persnaco";
    $valores[] = $nacionalidad;
    $campos[] = "persdire";
    $valores[] = $direccion;
    $campos[] = "perscatg";
    $valores[] = "REPRESENTANTE";

    $camposstring = implode(", ", $campos);
    $interrogantes = implode(", ", array_fill(0, count($valores), '?'));
    $cadena = 'INSERT INTO tablpers(' . $camposstring . ') VALUES (' . $interrogantes . ')';
    $sql = $database->prepare($cadena);
    $sql->bind_param(str_repeat("s", count($valores)), ...$valores);
    $sql->execute();
    $sql->close();

    $sql = $database->prepare('INSERT INTO tabluser(username, perscedi, userpawo, usercorr) VALUES (?, ?, ?, ?)');
    $sql->bind_param("ssss", $usuario, $cedula, $clave, $correo);
    $sql->execute();
    $sql->close();

    $campos = [];
    $valores = [];
    $campos[] = 'repreced';
    $valores[] = $cedula;
    $campos[] = 'perscedi';
    $valores[] = $cedula;
    $campos[] = 'repre_fe';
    $valores[] = $fe;

    if (!empty($titulo)) {
        $campos[] = 'repretit';
        $valores[] = $titulo;
    };

    if (!empty($trabajo)) {
        $campos[] = 'repretrb';
        $valores[] = $trabajo;
    };

    if (!empty($lugartrabajo)) {
        $campos[] = 'reprelug';
        $valores[] = $lugartrabajo;
    };

    $camposstring = implode(", ", $campos);
    $interrogantes = implode(", ", array_fill(0, count($valores), '?'));

    $cadena = 'INSERT INTO tabrepre(' . $camposstring . ') VALUES (' . $interrogantes . ')';
    $sql = $database->prepare($cadena);
    $sql->bind_param(str_repeat("s", count($valores)), ...$valores);
    $sql->execute();
    $sql->close();

    $sql = $database->prepare('SELECT u.username, p.perscedi, u.usercorr, u.usercode, p.persfoto, p.perscatg FROM tabluser AS u, tablpers AS p WHERE p.perscedi = u.perscedi AND u.username = ? AND p.perscedi = ?');
    $sql->bind_param("ss", $usuario, $cedula);
    $sql->execute();
    $result = $sql->get_result()->fetch_assoc();
    $sql->close();

    session_start();
    $_SESSION['sesion'] = true;
    $_SESSION['usuario'] = $result['username'];
    $_SESSION['cedula'] = $result['perscedi'];
    $_SESSION['correo'] = $result['usercorr'];
    $_SESSION['nivelseguridad'] = $result['usercode'];
    $_SESSION['perfil'] = $result['persfoto'];
    $_SESSION['categoria'] = $result['perscatg'];

    Cerrar_Conexion($database);
    header("Location: ../../sistema/inicio.php");
    exit;
} else {
    Cerrar_Conexion($database);
    header("Location: ../../registrorepre.php");
    exit;
};
