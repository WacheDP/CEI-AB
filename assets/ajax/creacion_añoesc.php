<?php
require "../php/basedatos.php";

$inicio = $_POST['inicio'];
$final = $_POST['final'];
$respuesta = "";

if (!empty($inicio) && !empty($final)) {
    $inicio = new DateTime($_POST['inicio']);
    $final = new DateTime($_POST['final']);
    $codigo = $inicio->format("Y") . ' - ' . $final->format("Y");

    $sql = $database->prepare('SELECT * FROM tbañoesc WHERE añsccodg = ?');
    $sql->bind_param("s", $codigo);
    $sql->execute();
    $nañosescolares = $sql->get_result()->num_rows;

    if ($nañosescolares != 0) {
        $respuesta .= '<div class="alert alert-danger alerta" role="alert">El año escolar ya esta registrado</div>';
    } else {
        $respuesta .= '<input type="submit" class="btn btn-success boton" name="btn" value="Crear">';
    };
};

Cerrar_Conexion($database);
echo $respuesta;
