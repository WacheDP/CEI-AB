<?php
require "./basedatos.php";

$niño = $_GET['niño'];
$pagina = $_GET['pagina'];

$sql = $database->prepare('UPDATE tablniño AS n SET n.nñestado = "Deshabilitado" WHERE n.nñcedesc = ?');
$sql->bind_param("s", $niño);
$sql->execute();
$sql->close();

Cerrar_Conexion($database);
header("Location: ../../sistema/" . $pagina);
