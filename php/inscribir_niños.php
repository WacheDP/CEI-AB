<?php
require "./clases.php";
require "./conexion.php";
session_start();
require "./filtro.php";

if ($_GET['sebo'] == 1) {
    $materia = $_GET['codigo'];
    $datos = $_SESSION['datos_niños'];
    $expediente = $_SESSION['expedientes_niños'];

    $sql = $conexion->prepare('INSERT INTO abniño(niñociesc, niñonom1, niñonom2, niñoapel1, niñoapel2, niñosex, niñofecnac, niñonacion, niñolugnac, parrcod, niñodir, niñotransp, niñofoto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $sql->bind_param(
        "sssssssssssss",
        $datos['cedulaescolar'],
        $datos['nombre1'],
        $datos['nombre2'],
        $datos['apellido1'],
        $datos['apellido2'],
        $datos['sexo'],
        $datos['fechanacimiento'],
        $datos['nacionalidad'],
        $datos['lugarnacimiento'],
        $datos['parroquia'],
        $datos['direccion'],
        $datos['transporte'],
        $datos['foto']
    );
    $sql->execute();
    $sql->close();

    $sql = $conexion->prepare('INSERT INTO abniñosa VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $sql->bind_param(
        "sssisssiisisissss",
        $datos['cedulaescolar'],
        $datos['cedulaescolar'],
        $expediente['doctor'],
        $expediente['alergia'],
        $expediente['alergia-comida'],
        $expediente['alergia-medicina'],
        $expediente['atencion-medica'],
        $expediente['limitaciones'],
        $expediente['convulsion-check'],
        $expediente['convulsion-text'],
        $expediente['sae-check'],
        $expediente['sae-text'],
        $expediente['numero-habitantes'],
        $expediente['turno-alterno'],
        $expediente['deporte'],
        $expediente['fines-semanas'],
        $expediente['observacion']
    );
    $sql->execute();
    $sql->close();

    $sql = $conexion->prepare('INSERT INTO abpar VALUES (REPLACE(UUID(), "-", ""), ?, ?, ?, ?)');
    $sql->bind_param("sssi", $datos['cedulaescolar'], $cedula, $datos['parentezco'], $datos['convivencia']);
    $sql->execute();
    $sql->close();

    $sql = $conexion->prepare('INSERT INTO detmatniño VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
    $sql->bind_param("ss", $materia, $datos['cedulaescolar']);
    $sql->execute();
    $sql->close();

    $sql = $conexion->prepare('SELECT p.niñociesc FROM abpar AS p, abpers AS r WHERE p.persci = r.persci AND r.persci = ?;');
    $sql->bind_param("s", $cedula);
    $sql->execute();
    $exe = $sql->get_result();
    $sql->close();

    if ($exe->num_rows > 1) {
        $n = $exe->num_rows - 1;
        while ($row = $exe->fetch_assoc()) {
            $sql = $conexion->prepare('UPDATE abniño SET niñoherm = ? WHERE niñociesc = ?;');
            $sql->bind_param("is", $n, $row['niñociesc']);
            $sql->execute();
            $sql->close();
        };
    };

    $exe->free_result();
};

require "./cerrar_conexion.php";
header("Location: ../niños.php");
exit();
