<?php
require "./conexion.php";

if (!empty($_POST['btn'])) {

    $inicio = $_POST['inicio'];
    $fin = $_POST['final'];

    $time1 = strtotime($inicio);
    $time2 = strtotime($fin);
    $year1 = date("Y", $time1);
    $year2 = date("Y", $time2);
    $codigo = $year1 . '-' . $year2;

    $sql = $conexion->prepare('INSERT INTO abañoesc(añoesccod, añoescini, añoescfin) VALUES (?, ?, ?)');
    $sql->bind_param("sss", $codigo, $inicio, $fin);
    $sql->execute();

    $sql->close();
    require "./cerrar_conexion.php";
    header("Location: ../planificacion.php");
    exit();
} else {
    require "./cerrar_conexion.php";
    header("Location: ../planificacion.php");
    exit();
};
