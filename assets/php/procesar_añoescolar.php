<?php
require "./basedatos.php";

if (isset($_POST['btn'])) {
    $inicio = new DateTime($_POST['inicio']);
    $final = new DateTime($_POST['final']);
    $codigo = $inicio->format("Y") . '-' . $final->format("Y");

    $sql = $database->prepare('SELECT * FROM tbañoesc WHERE añsccodg = ?');
    $sql->bind_param("s", $codigo);
    $sql->execute();
    $nañosescolares = $sql->get_result()->num_rows;

    if ($nañosescolares != 0) {
        $html = "";
        $html .= '<script>alert("El año escolar ya esta registrado...");';
        $html .= 'window.location.href="../../sistema/planificacion.php";</script>';
        echo $html;
        Cerrar_Conexion($database);
        exit;
    };

    $sql = $database->prepare('INSERT INTO tbañoesc VALUES (?, ?, ?)');
    $sql->bind_param("sss", $codigo, $inicio->format("Y-m-d"), $final->format("Y-m-d"));
    $sql->execute();
    $sql->close();
};

Cerrar_Conexion($database);
header("Location: ../../sistema/planificacion.php");
exit;
