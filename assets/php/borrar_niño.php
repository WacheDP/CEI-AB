<?php
require "./basedatos.php";

$niño = $_GET['niño'];

$sql = $database->prepare('DELETE FROM tablniño WHERE nñcedesc = ?');
$sql->bind_param("s", $niño);
$sql->execute();
$sql->close();

Cerrar_Conexion($database);
header("Location: ../../sistema/todos_niños.php");
