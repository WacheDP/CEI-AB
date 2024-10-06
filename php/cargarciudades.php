<?php
require "./conexion.php";

$idmunicipio = $_GET['municipio'];
$sql = $conexion->prepare('SELECT ciucod, ciunom FROM abciu WHERE muncod=?');
$sql->bind_param("s", $idmunicipio);
$sql->execute();
$ciudades = $sql->get_result();

$html = "";
$html .= '<option value="">Seleccione una opción</option>';
while ($ciudad = $ciudades->fetch_assoc()) {
    $html .= '<option value="' . htmlspecialchars($ciudad['ciucod']) . '">' . htmlspecialchars($ciudad['ciunom']) . '</option>';
};
echo $html;

$ciudades->free_result();
$sql->close();

require "./cerrar_conexion.php";
