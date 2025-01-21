<?php
require "../php/basedatos.php";

$id = $_POST['id'];

$sql = $database->prepare('SELECT c.ciudadcd, c.ciudadnm FROM tdciudad AS c WHERE c.muncpcod = ?');
$sql->bind_param("s", $id);
$sql->execute();
$ciudades = $sql->get_result();
$sql->close();

$html = "";
$html .= '<option value="">Seleccione la ciudad</option>';
while ($ciudad = $ciudades->fetch_assoc()) {
    $html .= '<option value="' . $ciudad['ciudadcd'] . '">' . $ciudad['ciudadnm'] . '</option>';
};

$respuesta = [
    "ciudad" => $html,
    "parroquia" => '<option value="">Seleccione la parroquia</option>'
];

Cerrar_Conexion($database);
echo json_encode($respuesta);
