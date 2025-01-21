<?php
require "../php/basedatos.php";

$id = $_POST['id'];

$sql = $database->prepare('SELECT m.muncpcod, m.muncpnom FROM tdmuncip AS m WHERE m.estdcodg = ?');
$sql->bind_param("s", $id);
$sql->execute();
$municipios = $sql->get_result();
$sql->close();

$html = "";
$html .= '<option value="">Seleccione el municipio</option>';
while ($municipio = $municipios->fetch_assoc()) {
    $html .= '<option value="' . $municipio['muncpcod'] . '">' . $municipio['muncpnom'] . '</option>';
};

$respuesta = [
    "municipio" => $html,
    "ciudad" => '<option value="">Seleccione la ciudad</option>',
    "parroquia" => '<option value="">Seleccione la parroquia</option>'
];

Cerrar_Conexion($database);
echo json_encode($respuesta);
