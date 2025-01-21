<?php
require "../php/basedatos.php";

$id = $_POST['id'];

$sql = $database->prepare('SELECT e.estdcodg, e.estdnomb FROM tablestd AS e WHERE e.paiscodg = ?');
$sql->bind_param("s", $id);
$sql->execute();
$estados = $sql->get_result();
$sql->close();

$html = "";
$html .= '<option value="">Seleccione el estado</option>';
while ($estado = $estados->fetch_assoc()) {
    $html .= '<option value="' . $estado['estdcodg'] . '">' . $estado['estdnomb'] . '</option>';
};

$respuesta = [
    "estado" => $html,
    "municipio" => '<option value="">Seleccione el municipio</option>',
    "ciudad" => '<option value="">Seleccione la ciudad</option>',
    "parroquia" => '<option value="">Seleccione la parroquia</option>'
];

Cerrar_Conexion($database);
echo json_encode($respuesta);