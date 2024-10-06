<?php
require "./clases.php";
require "./conexion.php";
session_start();
require "./filtro.php";

if ($_GET['sebo'] == 1) {
    $codigo = $_GET['codigo'];
    $datos = $_SESSION['datos_niños'];
    $expediente = $_SESSION['expedientes_niños'];

    $sql = $conexion->prepare('INSERT INTO abniño(niñociesc, niñonom1, niñonom2, niñonapel1, niñoapel2, niñosex, niñofecnac, niñonacion, niñolugnac, parrcod, niñodir, niñotransp, niñofoto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
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

    $sql = $conexion->prepare('INSERT INTO abniñosa(niñosacod, niñociesc, niñosadoc, niñosaalg, niñosafood, niñosamed, niñosaamed, niñosalimt, niñosavuls, niñosarvul, niñosasae, niñosarsae, niñosanhab, niñosatual, niñosadepo, niñosaplay, niñosaobsv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
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

    $sql = $conexion->prepare('INSERT INTO abpar(parcod, niñociesc, persci, partype, parvcnñ) VALUES (REPLACE(UUID(), "-", ""), ?, ?, ?, ?)');
    $sql->bind_param("sssi", $datos['cedulaescolar'], $cedula, $datos['parentezco'], $datos['convivencia']);
    $sql->execute();
    $sql->close();
};

require "./cerrar_conexion.php";
header("Location: ../sistema.php");
exit();
