<?php
require "./conexion.php";

$idpais = $_GET['pais'];
$sql = $conexion->prepare('SELECT estcod, estnom FROM abest WHERE paiscod = ?');
$sql->bind_param("s", $idpais);
$sql->execute();
$estados = $sql->get_result();

$html = "";
$html .= '<option value="">Seleccione una opción</option>';
while ($estado = $estados->fetch_assoc()) {
    $html .= '<option value="' . htmlspecialchars($estado['estcod']) . '">' . htmlspecialchars($estado['estnom']) . '</option>';
};
echo $html;

$estados->free_result();
$sql->close();

require "./cerrar_conexion.php";
