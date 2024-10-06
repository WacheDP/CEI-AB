<?php
require "./conexion.php";

$cedula = $_GET['cedula'];
$sql = $conexion->prepare('SELECT persci FROM abpers WHERE persci = ?');
$sql->bind_param("s", $cedula);
$sql->execute();
$exe = $sql->get_result();

$html = "";
if ($exe->num_rows != 0) {
    $html .= '<div id="validacion-ci2">';
    $html .= '<div class="validacion">';
    $html .= '<p>Esta cedula ya está registrada...</p>';
    $html .= '</div>';
    $html .= '</div>';
}
echo $html;

$exe->free_result();
$sql->close();

require "./cerrar_conexion.php";
