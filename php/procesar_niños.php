<?php
require "./info.php";
require "./clases.php";
session_start();
require "./filtro.php";

if (!empty($_POST['registro-btn'])) {

    $datos = [];
    $datos['parentezco'] = $_POST['parentezco'];
    $bandera = $_POST['convivencia'];
    $datos['convivencia'] = $bandera;
    $datos['cedulaescolar'] = $_POST['cedula-escolar'];
    $datos['sexo'] = $_POST['sexo'];
    $datos['nombre1'] = strtoupper($_POST['nombre1']);
    $datos['nombre2'] = strtoupper($_POST['nombre2']);
    $datos['apellido1'] = strtoupper($_POST['apellido1']);
    $datos['apellido2'] = strtoupper($_POST['apellido2']);
    $datos['nacionalidad'] = $_POST['nacionalidad'];

    $fecha = $_POST['fechanacer'];
    list($year, $mes, $dia) = explode('-', $fecha);

    if (checkdate($mes, $dia, $year)) {
        date_default_timezone_set('America/Caracas');
        $hoy = date('Y');
        $limit = $hoy - 5;

        if ($year < $limit) {
            echo '<script> alert("Esa edad no es válida..."); window.location.href = "../registro.php"; </script>';
            exit();
        };
    } else {
        echo '<script> alert("Esa edad no es válida..."); window.location.href = "../registro.php"; </script>';
        exit();
    };

    $datos['fechanacimiento'] = $_POST['fechanacer'];
    $datos['lugarnacimiento'] = $_POST['lugarnacer'];
    $datos['transporte'] = $_POST['transporte'];

    /*
    //ARREGLAR
    if (isset($_FILES['foto'])) {

        $carpeta_destino = '../' . $carpeta;
        $nombre_archivo = $_FILES['foto']['name'];
        $tipo_archivo = $_FILES['foto']['type'];
        $tamano_archivo = $_FILES['foto']['size'];
        $tmp_archivo = $_FILES['foto']['tmp_name'];
        $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

        //ARREGLAR, 
        $error = "";
        if (!in_array($extension, $extensiones_validas)) {
            $error .= "<script>";
            $error .= 'alert("Solo se permiten archivos JPG, PNG, JPEG Y WEBP");';
            $error .= 'window.location.href="../niños.php";';
            $error .= "</script>";
            echo $error;
            exit();
        } else if ($tamano_archivo > 5242880) {
            $error .= "<script>";
            $error .= 'alert("El archivo es demasiado grande, prueba con imagenes menores a 5Mb");';
            $error .= 'window.location.href="../niños.php";';
            $error .= "</script>";
            echo $error;
            exit();
        } else {
            $nuevo_nombre = uniqid("niño_") . "." . $extension;
            $nueva_ruta = $carpeta_destino . $nuevo_nombre;

            if (!move_uploaded_file($tmp_archivo, $ruta_destino)) {
                $error .= "<script>";
                $error .= 'alert("Ha ocurrido un error al subir el archivo");';
                $error .= 'window.location.href="../niños.php";';
                $error .= "</script>";
                echo $error;
                exit();
            };
        };

        $datos['foto'] = $nuevo_nombre;
    } else {

    };
*/

    $datos['foto'] = "STAND.webp";

    if ($bandera) {
        $datos['parroquia'] = $parroquia;
        $datos['direccion'] = $direccion;
    } else {
        $datos['parroquia'] = $_POST['parroquia'];
        $datos['direccion'] = $_POST['dir'];
    };

    $expediente = [];
    $expediente['doctor'] = $_POST['doctor'];
    $expediente['alergia'] = $_POST['alergia-box'];
    $expediente['alergia-comida'] = $_POST['alergia-food'];
    $expediente['alergia-medicina'] = $_POST['alergica-medicina'];
    $expediente['atencion-medica'] = $_POST['atencion-medica'];
    $expediente['limitaciones'] = $_POST['limitaciones'];
    $expediente['convulsion-check'] = $_POST['convulsion-check'];
    $expediente['convulsion-text'] = $_POST['convulsion-text'];
    $expediente['sae-check'] = $_POST['sae-check'];
    $expediente['sae-text'] = $_POST['sae-text'];
    $expediente['numero-habitantes'] = $_POST['numero-habitantes'];
    $expediente['turno-alterno'] = $_POST['turno-alterno'];
    $expediente['deporte'] = $_POST['deporte'];
    $expediente['fines-semanas'] = $_POST['fines-semanas'];
    $expediente['observacion'] = $_POST['observacion'];

    $_SESSION['datos_niños'] = $datos;
    $_SESSION['expedientes_niños'] = $expediente;

    header("Location: ../inscripciones.php?sebo=" . true);
    exit();
} else {
    header("Location: ../niños.php");
    exit();
};
