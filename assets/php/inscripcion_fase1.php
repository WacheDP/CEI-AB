<?php
require "./basedatos.php";

if (isset($_POST['btn'])) {
    //Obligatorio
    $representante = $_POST['cedula-representante'];
    $niño = $_POST['ced-esc'];
    $relacion = $_POST['parentezco'];
    $sexo = $_POST['sexo'];
    $convivencia = $_POST['convive'] ? true : false;
    $nombre1 = strtolower($_POST['nom1']);
    $apellido1 = strtolower($_POST['ape1']);
    $fecha_nacer = $_POST['fecnac'];
    $nacionalidad = $_POST['nacionalidad'];
    $direccion = "";
    $parroquia = "";
    $foto = $_FILES['foto'];

    //Opcional
    $nombre2 = strtolower($_POST['nom2']);
    $apellido2 = strtolower($_POST['ape2']);
    $lugar_nacer = $_POST['lugnac'];
    $transporte = $_POST['viaje'];

    $sql = $database->prepare('SELECT n.nñcedesc FROM tablniño AS n WHERE n.nñcedesc = ?');
    $sql->bind_param("s", $niño);
    $sql->execute();
    $cedulas = $sql->get_result()->num_rows;
    $sql->close();

    if ($cedulas != 0) {
        $html = "";
        $html .= '<script>alert("La cedula escolar ya existe...");';
        $html .= 'window.location.href = "../../sistema/inscripciones.php";</script>';
        Cerrar_Conexion($database);
        echo $html;
    };

    $edad = false;
    date_default_timezone_set("America/Caracas");
    $fecha = DateTime::createFromFormat("Y-m-d", $fecha_nacer);
    $hoy = new DateTime();

    if ($fecha > $hoy) {
        $edad = true;
    };

    $numero = $hoy->diff($$fecha)->y;

    if ($numero < 1 || $numero >= 6) {
        $html = "";
        $html .= '<script>alert("No cuenta con la edad apropiada...");';
        $html .= 'window.location.href = "../../sistema/inscripciones.php";</script>';
        Cerrar_Conexion($database);
        echo $html;
    };

    if ($convivencia) {
        $sql = $database->prepare('SELECT p.persdire, p.parrqcod FROM tablpers AS p WHERE p.perscedi = ?');
        $sql->bind_param("s", $representante);
        $sql->execute();
        $datos = $sql->get_result()->fetch_assoc();
        $sql->close();
        $parroquia = $datos['parrqcod'];
        $direccion = $datos['persdire'];
    } else {
        $parroquia = $_POST['parroquia'];
        $direccion = $_POST['direccion'];
    };

    if ($foto['error'] == UPLOAD_ERR_OK) {
        $foto_nombre = $foto['name'];
        $foto_ruta = $foto['tmp_name'];
        $destino = "../temp/" . basename($foto_nombre);
        move_uploaded_file($foto_ruta, $destino);
    } else {
        $html = "";
        $html .= '<script>alert("Hubo un error al cargar la imagen...");';
        $html .= 'window.location.href = "../../sistema/inscripciones.php";</script>';
        Cerrar_Conexion($database);
        echo $html;
    };

    Cerrar_Conexion($database);
    header("Location: ../../sistema/planillasalud_niños.php");
} else {
    Cerrar_Conexion($database);
    header("Location: ../../sistema/inscripciones.php");
};
