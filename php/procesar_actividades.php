<?php
require "./conexion.php";

if (!empty($_POST['cronograma'])) {

    $form1 = [
        $_POST['actividad1'],
        $_POST['otra-actividad1'],
        $_POST['fecha-actividad11'],
        $_POST['fecha-actividad12'],
        $_POST['fecha-actividad13'],
        $_POST['fecha-actividad14'],
        $_POST['fecha-actividad15']
    ];

    $form2 = [
        $_POST['actividad2'],
        $_POST['otra-actividad2'],
        $_POST['fecha-actividad21'],
        $_POST['fecha-actividad22'],
        $_POST['fecha-actividad23'],
        $_POST['fecha-actividad24'],
        $_POST['fecha-actividad25']
    ];

    $form3 = [
        $_POST['actividad3'],
        $_POST['otra-actividad3'],
        $_POST['fecha-actividad31'],
        $_POST['fecha-actividad32'],
        $_POST['fecha-actividad33'],
        $_POST['fecha-actividad34'],
        $_POST['fecha-actividad35']
    ];

    $form4 = [
        $_POST['actividad4'],
        $_POST['otra-actividad4'],
        $_POST['fecha-actividad41'],
        $_POST['fecha-actividad42'],
        $_POST['fecha-actividad43'],
        $_POST['fecha-actividad44'],
        $_POST['fecha-actividad45']
    ];

    $form5 = [
        $_POST['actividad5'],
        $_POST['otra-actividad5'],
        $_POST['fecha-actividad51'],
        $_POST['fecha-actividad52'],
        $_POST['fecha-actividad53'],
        $_POST['fecha-actividad54'],
        $_POST['fecha-actividad55']
    ];

    date_default_timezone_set('America/Caracas');
    $hoy = date("Y-m-d");
    $sql = $conexion->prepare('SELECT * FROM abañoesc WHERE ? BETWEEN añoescini AND añoescfin');
    $sql->bind_param("s", $hoy);
    $sql->execute();
    $escolaryear = $sql->get_result()->fetch_assoc();
    $sql->close();

    $inicio = new DateTime($escolaryear['añoescini']);
    $fin = new DateTime($escolaryear['añoescfin']);

    for ($i = 2; $i < 7; $i++) {
        if (!empty($form1[$i])) {

            $fecha = new DateTime($form1[$i]);
            if ($fecha >= $inicio && $fecha <= $fin) {
                $sql = $conexion->prepare('SELECT calesccod FROM abcalesc WHERE calescdate = ?;');
                $sql->bind_param("s", $form1[$i]);
                $sql->execute();
                $bandera = $sql->get_result();
                $sql->close();

                if ($bandera->num_rows != 0) {
                    $UUID = $bandera->fetch_assoc();
                    $bandera->free_result();

                    $mensaje = "";
                    if ($form1[0] == "OTRO") {
                        $mensaje = strtoupper($form1[1]);
                    } else {
                        $mensaje = $form1[0];
                    };

                    $sql = $conexion->prepare('SELECT cracact FROM abcrac WHERE calesccod = ?;');
                    $sql->bind_param("s", $UUID['calesccod']);
                    $sql->execute();
                    $actividades = $sql->get_result();
                    $sql->close();

                    $act_repeat = false;
                    while ($actividad = $actividades->fetch_assoc()) {
                        if ($mensaje == $actividad['cracact']) {
                            $act_repeat = true;
                        };
                    };

                    $actividades->free_result();

                    if (!$act_repeat) {
                        $sql = $conexion->prepare('INSERT INTO abcrac(craccod, calesccod, cracact) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                        $sql->bind_param("ss", $UUID['calesccod'], $mensaje);
                        $sql->execute();
                        $sql->close();
                    };
                } else {
                    $sql = $conexion->prepare('INSERT INTO abcalesc(calesccod, añoesccod, calescdate) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $escolaryear['añoesccod'], $form1[$i]);
                    $sql->execute();
                    $sql->close();

                    $sql = $conexion->prepare('SELECT calesccod FROM abcalesc WHERE calescdate = ?;');
                    $sql->bind_param("s", $form1[$i]);
                    $sql->execute();
                    $UUID = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $mensaje = "";
                    if ($form1[0] == "OTRO") {
                        $mensaje = strtoupper($form1[1]);
                    } else {
                        $mensaje = $form1[0];
                    };

                    $sql = $conexion->prepare('INSERT INTO abcrac(craccod, calesccod, cracact) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $UUID['calesccod'], $mensaje);
                    $sql->execute();
                    $sql->close();
                };
            };
        };
    };

    for ($i = 2; $i < 7; $i++) {
        if (!empty($form2[$i])) {

            $fecha = new DateTime($form2[$i]);
            if ($fecha >= $inicio && $fecha <= $fin) {
                $sql = $conexion->prepare('SELECT calesccod FROM abcalesc WHERE calescdate = ?;');
                $sql->bind_param("s", $form2[$i]);
                $sql->execute();
                $bandera = $sql->get_result();
                $sql->close();


                if ($bandera->num_rows != 0) {
                    $UUID = $bandera->fetch_assoc();
                    $bandera->free_result();

                    $mensaje = "";
                    if ($form2[0] == "OTRO") {
                        $mensaje = strtoupper($form2[1]);
                    } else {
                        $mensaje = $form2[0];
                    };

                    $sql = $conexion->prepare('SELECT cracact FROM abcrac WHERE calesccod = ?;');
                    $sql->bind_param("s", $UUID['calesccod']);
                    $sql->execute();
                    $actividades = $sql->get_result();
                    $sql->close();

                    $act_repeat = false;
                    while ($actividad = $actividades->fetch_assoc()) {
                        if ($mensaje == $actividad['cracact']) {
                            $act_repeat = true;
                        };
                    };

                    $actividades->free_result();

                    if (!$act_repeat) {
                        $sql = $conexion->prepare('INSERT INTO abcrac(craccod, calesccod, cracact) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                        $sql->bind_param("ss", $UUID['calesccod'], $mensaje);
                        $sql->execute();
                        $sql->close();
                    };
                } else {
                    $sql = $conexion->prepare('INSERT INTO abcalesc(calesccod, añoesccod, calescdate) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $escolaryear['añoesccod'], $form2[$i]);
                    $sql->execute();
                    $sql->close();

                    $sql = $conexion->prepare('SELECT calesccod FROM abcalesc WHERE calescdate = ?;');
                    $sql->bind_param("s", $form2[$i]);
                    $sql->execute();
                    $UUID = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $mensaje = "";
                    if ($form2[0] == "OTRO") {
                        $mensaje = strtoupper($form2[1]);
                    } else {
                        $mensaje = $form2[0];
                    };

                    $sql = $conexion->prepare('INSERT INTO abcrac(craccod, calesccod, cracact) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $UUID['calesccod'], $mensaje);
                    $sql->execute();
                    $sql->close();
                };
            };
        };
    };

    for ($i = 2; $i < 7; $i++) {
        if (!empty($form3[$i])) {

            $fecha = new DateTime($form3[$i]);
            if ($fecha >= $inicio && $fecha <= $fin) {
                $sql = $conexion->prepare('SELECT calesccod FROM abcalesc WHERE calescdate = ?;');
                $sql->bind_param("s", $form3[$i]);
                $sql->execute();
                $bandera = $sql->get_result();
                $sql->close();

                if ($bandera->num_rows != 0) {
                    $UUID = $bandera->fetch_assoc();
                    $bandera->free_result();

                    $mensaje = "";
                    if ($form3[0] == "OTRO") {
                        $mensaje = strtoupper($form3[1]);
                    } else {
                        $mensaje = $form3[0];
                    };

                    $sql = $conexion->prepare('SELECT cracact FROM abcrac WHERE calesccod = ?;');
                    $sql->bind_param("s", $UUID['calesccod']);
                    $sql->execute();
                    $actividades = $sql->get_result();
                    $sql->close();

                    $act_repeat = false;
                    while ($actividad = $actividades->fetch_assoc()) {
                        if ($mensaje == $actividad['cracact']) {
                            $act_repeat = true;
                        };
                    };

                    $actividades->free_result();

                    if (!$act_repeat) {
                        $sql = $conexion->prepare('INSERT INTO abcrac(craccod, calesccod, cracact) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                        $sql->bind_param("ss", $UUID['calesccod'], $mensaje);
                        $sql->execute();
                        $sql->close();
                    };
                } else {
                    $sql = $conexion->prepare('INSERT INTO abcalesc(calesccod, añoesccod, calescdate) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $escolaryear['añoesccod'], $form3[$i]);
                    $sql->execute();
                    $sql->close();

                    $sql = $conexion->prepare('SELECT calesccod FROM abcalesc WHERE calescdate = ?;');
                    $sql->bind_param("s", $form3[$i]);
                    $sql->execute();
                    $UUID = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $mensaje = "";
                    if ($form3[0] == "OTRO") {
                        $mensaje = strtoupper($form3[1]);
                    } else {
                        $mensaje = $form3[0];
                    };

                    $sql = $conexion->prepare('INSERT INTO abcrac(craccod, calesccod, cracact) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $UUID['calesccod'], $mensaje);
                    $sql->execute();
                    $sql->close();
                };
            };
        };
    };

    for ($i = 2; $i < 7; $i++) {
        if (!empty($form4[$i])) {

            $fecha = new DateTime($form4[$i]);
            if ($fecha >= $inicio && $fecha <= $fin) {
                $sql = $conexion->prepare('SELECT calesccod FROM abcalesc WHERE calescdate = ?;');
                $sql->bind_param("s", $form4[$i]);
                $sql->execute();
                $bandera = $sql->get_result();
                $sql->close();

                $UUID = "";
                if ($bandera->num_rows != 0) {
                    $UUID = $bandera->fetch_assoc();
                    $bandera->free_result();

                    $mensaje = "";
                    if ($form4[0] == "OTRO") {
                        $mensaje = strtoupper($form4[1]);
                    } else {
                        $mensaje = $form4[0];
                    };

                    $sql = $conexion->prepare('SELECT cracact FROM abcrac WHERE calesccod = ?;');
                    $sql->bind_param("s", $UUID['calesccod']);
                    $sql->execute();
                    $actividades = $sql->get_result();
                    $sql->close();

                    $act_repeat = false;
                    while ($actividad = $actividades->fetch_assoc()) {
                        if ($mensaje == $actividad['cracact']) {
                            $act_repeat = true;
                        };
                    };

                    $actividades->free_result();

                    if (!$act_repeat) {
                        $sql = $conexion->prepare('INSERT INTO abcrac(craccod, calesccod, cracact) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                        $sql->bind_param("ss", $UUID['calesccod'], $mensaje);
                        $sql->execute();
                        $sql->close();
                    };
                } else {
                    $sql = $conexion->prepare('INSERT INTO abcalesc(calesccod, añoesccod, calescdate) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $escolaryear['añoesccod'], $form4[$i]);
                    $sql->execute();
                    $sql->close();

                    $sql = $conexion->prepare('SELECT calesccod FROM abcalesc WHERE calescdate = ?;');
                    $sql->bind_param("s", $form4[$i]);
                    $sql->execute();
                    $UUID = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $mensaje = "";
                    if ($form4[0] == "OTRO") {
                        $mensaje = strtoupper($form4[1]);
                    } else {
                        $mensaje = $form4[0];
                    };

                    $sql = $conexion->prepare('INSERT INTO abcrac(craccod, calesccod, cracact) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $UUID['calesccod'], $mensaje);
                    $sql->execute();
                    $sql->close();
                };
            };
        };
    };

    for ($i = 2; $i < 7; $i++) {
        if (!empty($form5[$i])) {

            $fecha = new DateTime($form5[$i]);
            if ($fecha >= $inicio && $fecha <= $fin) {
                $sql = $conexion->prepare('SELECT calesccod FROM abcalesc WHERE calescdate = ?;');
                $sql->bind_param("s", $form5[$i]);
                $sql->execute();
                $bandera = $sql->get_result();
                $sql->close();

                $UUID = "";
                if ($bandera->num_rows != 0) {
                    $UUID = $bandera->fetch_assoc();
                    $bandera->free_result();

                    $mensaje = "";
                    if ($form5[0] == "OTRO") {
                        $mensaje = strtoupper($form5[1]);
                    } else {
                        $mensaje = $form5[0];
                    };

                    $sql = $conexion->prepare('SELECT cracact FROM abcrac WHERE calesccod = ?;');
                    $sql->bind_param("s", $UUID['calesccod']);
                    $sql->execute();
                    $actividades = $sql->get_result();
                    $sql->close();

                    $act_repeat = false;
                    while ($actividad = $actividades->fetch_assoc()) {
                        if ($mensaje == $actividad['cracact']) {
                            $act_repeat = true;
                        };
                    };

                    $actividades->free_result();

                    if (!$act_repeat) {
                        $sql = $conexion->prepare('INSERT INTO abcrac(craccod, calesccod, cracact) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                        $sql->bind_param("ss", $UUID['calesccod'], $mensaje);
                        $sql->execute();
                        $sql->close();
                    };
                } else {
                    $sql = $conexion->prepare('INSERT INTO abcalesc(calesccod, añoesccod, calescdate) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $escolaryear['añoesccod'], $form5[$i]);
                    $sql->execute();
                    $sql->close();

                    $sql = $conexion->prepare('SELECT calesccod FROM abcalesc WHERE calescdate = ?;');
                    $sql->bind_param("s", $form5[$i]);
                    $sql->execute();
                    $UUID = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $mensaje = "";
                    if ($form5[0] == "OTRO") {
                        $mensaje = strtoupper($form5[1]);
                    } else {
                        $mensaje = $form5[0];
                    };

                    $sql = $conexion->prepare('INSERT INTO abcrac(craccod, calesccod, cracact) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $UUID['calesccod'], $mensaje);
                    $sql->execute();
                    $sql->close();
                };
            };
        };
    };

    require "./cerrar_conexion.php";
    header("Location: ../planificacion.php");
    exit();
} else {
    require "./cerrar_conexion.php";
    header("Location: ../planificacion.php");
    exit();
};
