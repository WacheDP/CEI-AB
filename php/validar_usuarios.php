<?php
require "./conexion.php";

$bandera = $_GET['sebo'];
$usuario = $_GET['usuario'];
$sql = $conexion->prepare('SELECT usernom FROM abuser WHERE usernom = ?');
$sql->bind_param("s", $usuario);
$sql->execute();
$exe = $sql->get_result();

$html = "";
switch ($bandera) {
    case 1:
        if ($exe->num_rows != 0) {
            $html .= '<div id="validacion-user2">';
            $html .= '<div class="validacion">';
            $html .= '<p>Este usuario ya está registrado...</p>';
            $html .= '</div>';
            $html .= '</div>';
        };
        break;

    case 2:
        if ($exe->num_rows != 1) {
            $html .= '<div id="validar-user">';
            $html .= '<div class="validacion">';
            $html .= '<p>El nombre de usuario no existe...</p>';
            $html .= '</div>';
            $html .= '</div>';
        }
        break;
};

echo $html;

$exe->free_result();
$sql->close();

require "./cerrar_conexion.php";
