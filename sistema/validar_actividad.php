<?php

function Validar_Actividad($actividad)
{
    require_once "../assets/php/basedatos.php";

    date_default_timezone_set("America/Caracas");
    $hoy = date("Y-m-d");

    $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal, tbcroact AS cro WHERE cro.clsccodg = cal.clsccodg AND cal.clscdate = ? AND cro.crctacto = ?');
    $sql->bind_param("ss", $hoy, $actividad);
    $sql->execute();
    $numero = $sql->get_result()->num_rows;
    $sql->close();

    Cerrar_Conexion($database);

    if ($numero) {
        return true;
    } else {
        return false;
    };
};
