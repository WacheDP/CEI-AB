<?php
require "./basedatos.php";

if (isset($_POST['btn'])) {
    $codigo = $_POST['codigo'];
    $status = $_POST['estado'];
    $razon = $_POST['razon'];

    $sql = $database->prepare('UPDATE detlaula AS d SET d.daulastt = ?, d.daulaobv = ?, d.dauladia = CURRENT_TIMESTAMP WHERE d.daulacod = ?');
    $sql->bind_param("sss", $status, $razon, $codigo);
    $sql->execute();
}

Cerrar_Conexion($database);
header("Location: ../../sistema/salones.php");
exit;
