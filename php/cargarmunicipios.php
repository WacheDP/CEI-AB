<?php
require "./conexion.php";

$idestado = $_GET['estado'];
$sql = $conexion->prepare('SELECT muncod, munnom FROM abmun WHERE estcod=?');
$sql->bind_param("s", $idestado);
$sql->execute();
$municipios = $sql->get_result();

$html = "";
$html .= '<option value="">Seleccione una opción</option>';
while ($municipio = $municipios->fetch_assoc()) {
    $html .= '<option value="' . htmlspecialchars($municipio['muncod']) . '">' . htmlspecialchars($municipio['munnom']) . '</option>';
};
echo $html;

$municipios->free_result();
$sql->close();

require "./cerrar_conexion.php";
