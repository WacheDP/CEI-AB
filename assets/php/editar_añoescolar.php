<?php
require "./basedatos.php";

if (isset($_POST['btn'])) {
    $id = $_POST['codigo'];
    $inicio = new DateTime($_POST['inicio']);
    $final = new DateTime($_POST['final']);

    $sql = $database->prepare('SELECT a.añscfini, a.añscffin FROM tbañoesc AS a WHERE a.añsccodg = ?');
    $sql->bind_param("s", $id);
    $sql->execute();
    $resultados = $sql->get_result()->fetch_assoc();
    $sql->close();

    $fecha_ini = $inicio->format("Y-m-d");
    $fecha_fin = $final->format("Y-m-d");

    if ($fecha_ini != $resultados['añscfini']) {
        $sql = $database->prepare('UPDATE tbañoesc SET añscfini = ? WHERE añsccodg = ?');
        $sql->bind_param("ss", $fecha_ini, $id);
        $sql->execute();
        $sql->close();
    };

    if ($fecha_fin != $resultados['añscffin']) {
        $sql = $database->prepare('UPDATE tbañoesc SET añscffin = ? WHERE añsccodg = ?');
        $sql->bind_param("ss", $fecha_fin, $id);
        $sql->execute();
        $sql->close();
    }
};

Cerrar_Conexion($database);
header("Location: ../../sistema/planificacion.php");
exit;
