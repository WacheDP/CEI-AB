<?php
require "./conexion.php";

$idciudad = $_GET['ciudad'];
$sql = $conexion->prepare('SELECT parrcod, parrnom FROM abparr WHERE ciucod=?');
$sql->bind_param("s", $idciudad);
$sql->execute();
$parroquias = $sql->get_result();

$html = "";
$html .= '<option value="">Seleccione una opción</option>';
while ($parroquia = $parroquias->fetch_assoc()) {
    $html .= '<option value="' . htmlspecialchars($parroquia['parrcod']) . '">' . htmlspecialchars($parroquia['parrnom']) . '</option>';
};
echo $html;

$parroquias->free_result();
$sql->close();

require "./cerrar_conexion.php";
