<?php
require "./conexion.php";

if (!empty($_POST['plan-btn'])) {

    $hoy = date("Y-m-d");
    $sql = $conexion->prepare('SELECT añoesccod FROM abañoesc WHERE ? BETWEEN añoescini AND añoescfin');
    $sql->bind_param("s", $hoy);
    $sql->execute();
    $codigo = $sql->get_result()->fetch_assoc();
    $sql->close();

    $matricula1 = [
        "aula" => $_POST['salon1'],
        "turno" => $_POST['turno1'],
        "grupo" => $_POST['grupo1'],
        "docente1" => $_POST['docentes11'],
        "docente2" => $_POST['docentes12']
    ];

    $matricula2 = [
        "aula" => $_POST['salon2'],
        "turno" => $_POST['turno2'],
        "grupo" => $_POST['grupo2'],
        "docente1" => $_POST['docentes21'],
        "docente2" => $_POST['docentes22']
    ];

    $matricula3 = [
        "aula" => $_POST['salon3'],
        "turno" => $_POST['turno3'],
        "grupo" => $_POST['grupo3'],
        "docente1" => $_POST['docentes31'],
        "docente2" => $_POST['docentes32']
    ];

    $matricula4 = [
        "aula" => $_POST['salon4'],
        "turno" => $_POST['turno4'],
        "grupo" => $_POST['grupo4'],
        "docente1" => $_POST['docentes41'],
        "docente2" => $_POST['docentes42']
    ];

    $bandera = false;
    $nombres = [
        $matricula1['docente1'],
        $matricula1['docente2'],
        $matricula2['docente1'],
        $matricula2['docente2'],
        $matricula3['docente1'],
        $matricula3['docente2'],
        $matricula4['docente1'],
        $matricula4['docente2']
    ];

    for ($i = 0; $i < 8; $i++) {
        if (!empty($nombres[$i])) {
            $sql = $conexion->prepare('SELECT d.persoci FROM abmat AS m, detmatperso AS d WHERE m.añoesccod = ? AND d.matcod = m.matcod AND d.persoci = ?;');
            $sql->bind_param("ss", $codigo['añoesccod'], $nombres[$i]);
            $sql->execute();
            $exe = $sql->get_result()->num_rows;
            $sql->close();

            if ($exe != 0) {
                $bandera = true;
                break;
            };

            for ($j = $i + 1; $j < 8; $j++) {
                if (!empty($nombres[$j])) {
                    if ($nombres[$i] == $nombres[$j]) {
                        $bandera = true;
                        break;
                    };
                };
            };
        };
    };

    if ($bandera) {
        require "./cerrar_conexion.php";
        echo '<script> alert("No se pueden repetir los nombres de los docentes..."); window.location.href = "../planificacion.php"; </script>';
        exit();
    } else {

        if (!empty($matricula1['docente1']) || !empty($matricula1['docente2'])) {

            $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoesccod = ?;');
            $sql->bind_param("ssss", $matricula1['aula'], $matricula1['turno'], $matricula1['grupo'], $codigo['añoesccod']);
            $sql->execute();
            $numero = $sql->get_result()->num_rows;
            $sql->close();

            if ($numero) {
                require "./cerrar_conexion.php";
                echo '<script> alert("Uno de los salones ya estaba registrado..."); window.location.href = "../planificacion.php"; </script>';
                exit();
            } else {
                $sql = $conexion->prepare('INSERT INTO abmat(matcod, aulacod, matturn, matgroup, añoesccod) VALUES (REPLACE(UUID(), "-", ""), ?, ?, ?, ?)');
                $sql->bind_param("ssss", $matricula1['aula'], $matricula1['turno'], $matricula1['grupo'], $codigo['añoesccod']);
                $sql->execute();
                $sql->close();

                if (!empty($matricula1['docente1'])) {
                    $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoesccod = ?;');
                    $sql->bind_param("ssss", $matricula1['aula'], $matricula1['turno'], $matricula1['grupo'], $codigo['añoesccod']);
                    $sql->execute();
                    $clase = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $sql = $conexion->prepare('INSERT INTO detmatperso(detmpcod, matcod, persoci) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $clase['matcod'], $matricula1['docente1']);
                    $sql->execute();
                    $sql->close();
                };

                if (!empty($matricula1['docente2'])) {
                    $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoescañoesccod = ?;');
                    $sql->bind_param("ssss", $matricula1['aula'], $matricula1['turno'], $matricula1['grupo'], $codigo['añoesccod']);
                    $sql->execute();
                    $clase = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $sql = $conexion->prepare('INSERT INTO detmatperso(detmpcod, matcod, persoci) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $clase['matcod'], $matricula1['docente2']);
                    $sql->execute();
                    $sql->close();
                };
            };
        };

        if (!empty($matricula2['docente1']) || !empty($matricula2['docente2'])) {
            $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoescañoesccod = ?;');
            $sql->bind_param("ssss", $matricula2['aula'], $matricula2['turno'], $matricula2['grupo'], $codigo['añoesccod']);
            $sql->execute();
            $numero = $sql->get_result()->num_rows;
            $sql->close();

            if ($numero) {
                require "./cerrar_conexion.php";
                echo '<script> alert("Uno de los salones ya estaba registrado..."); window.location.href = "../registro.php"; </script>';
                exit();
            } else {
                $sql = $conexion->prepare('INSERT INTO abmat(matcod, aulacod, matturn, matgroup, añoesccod) VALUES (REPLACE(UUID(), "-", ""), ?, ?, ?, ?)');
                $sql->bind_param("ssss", $matricula2['aula'], $matricula2['turno'], $matricula2['grupo'], $codigo['añoesccod']);
                $sql->execute();
                $sql->close();

                if (!empty($matricula2['docente1'])) {
                    $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoescañoesccod = ?;');
                    $sql->bind_param("ssss", $matricula2['aula'], $matricula2['turno'], $matricula2['grupo'], $codigo['añoesccod']);
                    $sql->execute();
                    $clase = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $sql = $conexion->prepare('INSERT INTO detmatperso(detmpcod, matcod, persoci) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $clase['matcod'], $matricula2['docente1']);
                    $sql->execute();
                    $sql->close();
                };

                if (!empty($matricula2['docente2'])) {
                    $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoescañoesccod = ?;');
                    $sql->bind_param("ssss", $matricula2['aula'], $matricula2['turno'], $matricula2['grupo'], $codigo['añoesccod']);
                    $sql->execute();
                    $clase = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $sql = $conexion->prepare('INSERT INTO detmatperso(detmpcod, matcod, persoci) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $clase['matcod'], $matricula2['docente2']);
                    $sql->execute();
                    $sql->close();
                };
            };
        };

        if (!empty($matricula3['docente1']) || !empty($matricula3['docente2'])) {
            $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoescañoesccod = ?;');
            $sql->bind_param("ssss", $matricula3['aula'], $matricula3['turno'], $matricula3['grupo'], $codigo['añoesccod']);
            $sql->execute();
            $numero = $sql->get_result()->num_rows;
            $sql->close();

            if ($numero) {
                require "./cerrar_conexion.php";
                echo '<script> alert("Uno de los salones ya estaba registrado..."); window.location.href = "../registro.php"; </script>';
                exit();
            } else {
                $sql = $conexion->prepare('INSERT INTO abmat(matcod, aulacod, matturn, matgroup, añoesccod) VALUES (REPLACE(UUID(), "-", ""), ?, ?, ?, ?)');
                $sql->bind_param("ssss", $matricula3['aula'], $matricula3['turno'], $matricula3['grupo'], $codigo['añoesccod']);
                $sql->execute();
                $sql->close();

                if (!empty($matricula3['docente1'])) {
                    $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoescañoesccod = ?;');
                    $sql->bind_param("ssss", $matricula3['aula'], $matricula3['turno'], $matricula3['grupo'], $codigo['añoesccod']);
                    $sql->execute();
                    $clase = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $sql = $conexion->prepare('INSERT INTO detmatperso(detmpcod, matcod, persoci) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $clase['matcod'], $matricula3['docente1']);
                    $sql->execute();
                    $sql->close();
                };

                if (!empty($matricula3['docente2'])) {
                    $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoescañoesccod = ?;');
                    $sql->bind_param("ssss", $matricula3['aula'], $matricula3['turno'], $matricula3['grupo'], $codigo['añoesccod']);
                    $sql->execute();
                    $clase = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $sql = $conexion->prepare('INSERT INTO detmatperso(detmpcod, matcod, persoci) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $clase['matcod'], $matricula3['docente2']);
                    $sql->execute();
                    $sql->close();
                };
            };
        };

        if (!empty($matricula4['docente1']) || !empty($matricula4['docente2'])) {
            $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoescañoesccod = ?;');
            $sql->bind_param("ssss", $matricula4['aula'], $matricula4['turno'], $matricula4['grupo'], $codigo['añoesccod']);
            $sql->execute();
            $numero = $sql->get_result()->num_rows;
            $sql->close();

            if ($numero) {
                require "./cerrar_conexion.php";
                echo '<script> alert("Uno de los salones ya estaba registrado..."); window.location.href = "../registro.php"; </script>';
                exit();
            } else {
                $sql = $conexion->prepare('INSERT INTO abmat(matcod, aulacod, matturn, matgroup, añoesccod) VALUES (REPLACE(UUID(), "-", ""), ?, ?, ?, ?)');
                $sql->bind_param("ssss", $matricula4['aula'], $matricula4['turno'], $matricula4['grupo'], $codigo['añoesccod']);
                $sql->execute();
                $sql->close();

                if (!empty($matricula4['docente1'])) {
                    $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoescañoesccod = ?;');
                    $sql->bind_param("ssss", $matricula4['aula'], $matricula4['turno'], $matricula4['grupo'], $codigo['añoesccod']);
                    $sql->execute();
                    $clase = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $sql = $conexion->prepare('INSERT INTO detmatperso(detmpcod, matcod, persoci) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $clase['matcod'], $matricula4['docente1']);
                    $sql->execute();
                    $sql->close();
                };

                if (!empty($matricula4['docente2'])) {
                    $sql = $conexion->prepare('SELECT matcod FROM abmat where matseccion = "A" AND aulacod = ? AND matturn = ? AND matgroup = ? AND añoescañoesccod = ?;');
                    $sql->bind_param("ssss", $matricula4['aula'], $matricula4['turno'], $matricula4['grupo'], $codigo['añoesccod']);
                    $sql->execute();
                    $clase = $sql->get_result()->fetch_assoc();
                    $sql->close();

                    $sql = $conexion->prepare('INSERT INTO detmatperso(detmpcod, matcod, persoci) VALUES (REPLACE(UUID(), "-", ""), ?, ?)');
                    $sql->bind_param("ss", $clase['matcod'], $matricula4['docente2']);
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
