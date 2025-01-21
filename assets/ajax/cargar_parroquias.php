<?php
require "../php/basedatos.php";

$id = $_POST['id'];

$sql = $database->prepare('SELECT p.parrqcod, p.parrqnom FROM tabparrq AS p WHERE p.ciudadcd = ?');
$sql->bind_param("s", $id);
$sql->execute();
$parroquias = $sql->get_result();
$sql->close();

$html = "";
$html .= '<option value="">Seleccione la parroquia</option>';
while ($parroquia = $parroquias->fetch_assoc()) {
    $html .= '<option value="' . $parroquia['parrqcod'] . '">' . $parroquia['parrqnom'] . '</option>';
};

Cerrar_Conexion($database);
echo $html;
