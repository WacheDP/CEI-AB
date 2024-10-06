<?php
require "./conexion.php";

$bandera = $_GET['sebo'];
$html = "";

switch ($bandera) {
    case 1:
        $contraseña = $_GET['contraseña'];
        $validacion = $_GET['validacion'];

        if ($contraseña != $validacion && !empty($contraseña) && !empty($validacion)) {
            $html .= '<div class="validacion">';
            $html .= '<p>Las contraseñas no son iguales...</p>';
            $html .= '</div>';
        };
        break;

    case 2:
        $usuario = $_GET['usuario'];
        $contraseña = $_GET['contraseña'];

        $sql = $conexion->prepare('SELECT usernom, persci, userclave FROM abuser WHERE usernom = ?');
        $sql->bind_param("s", $usuario);
        $sql->execute();
        $exe = $sql->get_result();
        $comprobacion = $exe->fetch_assoc();

        if ($exe->num_rows != 0) {
            if (!password_verify($contraseña, $comprobacion['userclave'])) {
                $html .= '<div id="validar-password">';
                $html .= '<div class="validacion">';
                $html .= '<p>La contraseña es incorrecta...</p>';
                $html .= '</div>';
                $html .= '</div>';
            }
        };

        $exe->free_result();
        $sql->close();
        break;
};

echo $html;

require "./cerrar_conexion.php";
