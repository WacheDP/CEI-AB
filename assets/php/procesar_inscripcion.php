<?php
require "./basedatos.php";

if (isset($_GET['niño']) && isset($_GET['materia'])) {
    $niño = $_GET['niño'];
    $materia = $_GET['materia'];

    $sql = $database->prepare('UPDATE tablniño AS n SET n.nñestado = "Inscrito" WHERE n.nñcedesc = ?');
    $sql->bind_param("s", $niño);
    $sql->execute();
    $sql->close();

    $sql = $database->prepare('INSERT INTO detmatnñ(matcodig, nñcedesc) VALUES (?, ?)');
    $sql->bind_param("ss", $materia, $niño);
    $sql->execute();
    $sql->close();
};

Cerrar_Conexion($database);
header("Location: ../../sistema/inicio.php");
exit;
