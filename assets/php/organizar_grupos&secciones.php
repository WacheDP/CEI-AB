<?php
require "./basedatos.php";

if (isset($_POST['btn'])) {
    $añoescolar = $_POST['añoescolar'];
    $grupo = $_POST['grupo'];
    $turno = $_POST['turno'];
    $aula = $_POST['salon'];
    $docente1 = $_POST['docente1'];
    $docente2 = $_POST['docente2'];
    $docente3 = $_POST['docente3'];

    $sql = $database->prepare("SELECT d.persoced FROM tablamat AS m, detmatpo AS d WHERE d.matcodig = m.matcodig AND m.añsccodg = ? AND d.persoced = ?");
    $sql->bind_param("ss", $añoescolar, $docente1);
    $sql->execute();
    $sebo = $sql->get_result()->num_rows;
    $sql->close();

    if ($sebo != 0) {
        $alerta = '<script>alert("Docente 1 ya está registrado en un grupo...");';
        $alerta .= 'window.location.href = "../../sistema/grupos&secciones.php";</script>';
        echo $alerta;
        Cerrar_Conexion($database);
        exit;
    };

    if (!empty($docente2)) {
        $sql = $database->prepare("SELECT d.persoced FROM tablamat AS m, detmatpo AS d WHERE d.matcodig = m.matcodig AND m.añsccodg = ? AND d.persoced = ?");
        $sql->bind_param("ss", $añoescolar, $docente2);
        $sql->execute();
        $sebo = $sql->get_result()->num_rows;
        $sql->close();

        if ($sebo != 0) {
            $alerta = '<script>alert("Docente 2 ya está registrado en un grupo...");';
            $alerta .= 'window.location.href = "../../sistema/grupos&secciones.php";</script>';
            echo $alerta;
            Cerrar_Conexion($database);
            exit;
        };
    };

    if (!empty($docente3)) {
        $sql = $database->prepare("SELECT d.persoced FROM tablamat AS m, detmatpo AS d WHERE d.matcodig = m.matcodig AND m.añsccodg = ? AND d.persoced = ?");
        $sql->bind_param("ss", $añoescolar, $docente3);
        $sql->execute();
        $sebo = $sql->get_result()->num_rows;
        $sql->close();

        if ($sebo != 0) {
            $alerta = '<script>alert("Docente 3 ya está registrado en un grupo...");';
            $alerta .= 'window.location.href = "../../sistema/grupos&secciones.php";</script>';
            echo $alerta;
            Cerrar_Conexion($database);
            exit;
        };
    };

    $sql = $database->prepare('SELECT m.matsecco FROM tablamat AS m WHERE m.añsccodg = ? AND m.matturno = ? AND m.matgrupo = ?');
    $sql->bind_param("sss", $añoescolar, $turno, $grupo);
    $sql->execute();
    $secciones = $sql->get_result();
    $sql->close();

    if ($secciones->num_rows == 0) {
        $sql = $database->prepare('INSERT INTO tablamat(aulacodg, añsccodg, matturno, matgrupo) VALUES (?, ?, ?, ?)');
        $sql->bind_param("ssss", $aula, $añoescolar, $turno, $grupo);
        $sql->execute();
        $sql->close();

        $sql = $database->prepare("SELECT m.matcodig FROM tablamat AS m WHERE m.aulacodg = ? AND m.añsccodg = ? AND m.matturno = ? AND m.matgrupo = ? AND m.matsecco = 'A'");
        $sql->bind_param("ssss", $aula, $añoescolar, $turno, $grupo);
        $sql->execute();
        $codigo = $sql->get_result()->fetch_assoc();
        echo $codigo['matcodig'];
        $sql->close();

        $sql = $database->prepare("INSERT INTO detmatpo(matcodig, persoced) VALUES (?, ?)");
        $sql->bind_param("ss", $codigo['matcodig'], $docente1);
        $sql->execute();
        $sql->close();

        if (!empty($docente2)) {
            $sql = $database->prepare("INSERT INTO detmatpo(matcodig, persoced) VALUES (?, ?)");
            $sql->bind_param("ss", $codigo['matcodig'], $docente2);
            $sql->execute();
            $sql->close();
        };

        if (!empty($docente3)) {
            $sql = $database->prepare("INSERT INTO detmatpo(matcodig, persoced) VALUES (?, ?)");
            $sql->bind_param("ss", $codigo['matcodig'], $docente3);
            $sql->execute();
            $sql->close();
        };
    } else {
        $array = [];

        while ($seccion = $secciones->fetch_assoc()) {
            $array[] = $seccion['matsecco'];
        }

        $ultimo = end($array);
        $ASCII = ord($ultimo);
        $newSeccion = chr($ASCII + 1);

        $sql = $database->prepare('INSERT INTO tablamat(aulacodg, añsccodg, matturno, matgrupo, matsecco) VALUES (?, ?, ?, ?, ?)');
        $sql->bind_param("ssss", $aula, $añoescolar, $turno, $grupo, $newSeccion);
        $sql->execute();
        $sql->close();

        $sql = $database->prepare("SELECT m.matcodig FROM tablamat AS m WHERE m.aulacodg = ? AND m.añsccodg = ? AND m.matturno = ? AND m.matgrupo = ? AND m.matsecco = 'A'");
        $sql->bind_param("ssss", $aula, $añoescolar, $turno, $grupo);
        $sql->execute();
        $codigo = $sql->get_result()->fetch_assoc();
        echo $codigo['matcodig'];
        $sql->close();

        $sql = $database->prepare("INSERT INTO detmatpo(matcodig, persoced) VALUES (?, ?)");
        $sql->bind_param("ss", $codigo['matcodig'], $docente1);
        $sql->execute();
        $sql->close();

        if (!empty($docente2)) {
            $sql = $database->prepare("INSERT INTO detmatpo(matcodig, persoced) VALUES (?, ?)");
            $sql->bind_param("ss", $codigo['matcodig'], $docente2);
            $sql->execute();
            $sql->close();
        };

        if (!empty($docente3)) {
            $sql = $database->prepare("INSERT INTO detmatpo(matcodig, persoced) VALUES (?, ?)");
            $sql->bind_param("ss", $codigo['matcodig'], $docente3);
            $sql->execute();
            $sql->close();
        };
    }
};

Cerrar_Conexion($database);
header("Location: ../../sistema/grupos&secciones.php");
exit;
