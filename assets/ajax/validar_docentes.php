<?php
require "../php/basedatos.php";

function Filtrar_Señales($señales)
{
    $html = "";

    if (!$señales['doc1'] && !$señales['doc2'] && !$señales['doc3']) {
        $html .= '<input class="btn btn-success" type="submit" name="btn" value="Crear">';
    } else {
        $html .= '<div class="alert alert-danger" role="alert" style="margin-top: 5px;">';

        if ($señales['doc1']) {
            $html .= 'Docente 1 ya está registrado en un grupo <br>';
        }

        if ($señales['doc2']) {
            $html .= 'Docente 2 ya está registrado en un grupo <br>';
        }

        if ($señales['doc3']) {
            $html .= 'Docente 3 ya está registrado en un grupo';
        }

        $html .= '</div>';
    }

    return $html;
}

$docente1 = $_POST['docente1'];
$docente2 = $_POST['docente2'];
$docente3 = $_POST['docente3'];
$añoescolar = $_POST['añoescolar'];
$respuesta = "";

if (!empty($docente1)) {
    $señales = ["doc1" => false, "doc2" => false, "doc3" => false];

    $sql = $database->prepare("SELECT d.persoced FROM tablamat AS m, detmatpo AS d WHERE d.matcodig = m.matcodig AND m.añsccodg = ? AND d.persoced = ?");
    $sql->bind_param("ss", $añoescolar, $docente1);
    $sql->execute();
    $sebo = $sql->get_result()->num_rows;
    $sql->close();

    if ($sebo != 0) {
        $señales['doc1'] = true;
    };

    if (!empty($docente2)) {
        $sql = $database->prepare("SELECT d.persoced FROM tablamat AS m, detmatpo AS d WHERE d.matcodig = m.matcodig AND m.añsccodg = ? AND d.persoced = ?");
        $sql->bind_param("ss", $añoescolar, $docente2);
        $sql->execute();
        $sebo = $sql->get_result()->num_rows;
        $sql->close();

        if ($sebo != 0) {
            $señales['doc2'] = true;
        };
    };

    if (!empty($docente3)) {
        $sql = $database->prepare("SELECT d.persoced FROM tablamat AS m, detmatpo AS d WHERE d.matcodig = m.matcodig AND m.añsccodg = ? AND d.persoced = ?");
        $sql->bind_param("ss", $añoescolar, $docente3);
        $sql->execute();
        $sebo = $sql->get_result()->num_rows;
        $sql->close();

        if ($sebo != 0) {
            $señales['doc3'] = true;
        };
    };

    $respuesta = Filtrar_Señales($señales);
}

Cerrar_Conexion($database);
echo $respuesta;
