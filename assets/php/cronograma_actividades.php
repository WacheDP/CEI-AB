<?php
require "./basedatos.php";

if (isset($_POST['btn'])) {
    $añoescolar = $_POST['codigo'];
    $act1 = $_POST['actividad1'];
    $act2 = $_POST['actividad2'];
    $act3 = $_POST['actividad3'];

    if (!empty($act1)) {
        $date11 = $_POST['fecha1-1'];
        if (!empty($date11)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date11);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date11);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date11);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                $sql->execute();
                $sql->close();
            };
        };

        $date12 = $_POST['fecha1-2'];
        if (!empty($date12)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date12);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date12);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date12);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                $sql->execute();
                $sql->close();
            };
        };

        $date13 = $_POST['fecha1-3'];
        if (!empty($date13)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date13);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date13);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date13);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                $sql->execute();
                $sql->close();
            };
        };

        $date14 = $_POST['fecha1-4'];
        if (!empty($date14)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date14);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date14);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date14);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                $sql->execute();
                $sql->close();
            };
        };

        $date15 = $_POST['fecha1-5'];
        if (!empty($date15)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date15);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date15);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date15);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act1);
                $sql->execute();
                $sql->close();
            };
        };
    };

    if (!empty($act2)) {
        $date21 = $_POST['fecha2-1'];
        if (!empty($date21)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date21);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date21);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date21);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                $sql->execute();
                $sql->close();
            };
        };

        $date22 = $_POST['fecha2-2'];
        if (!empty($date22)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date22);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date22);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date22);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                $sql->execute();
                $sql->close();
            };
        };

        $date23 = $_POST['fecha2-3'];
        if (!empty($date23)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date23);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date23);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date23);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                $sql->execute();
                $sql->close();
            };
        };

        $date24 = $_POST['fecha2-4'];
        if (!empty($date24)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date24);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date24);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date24);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                $sql->execute();
                $sql->close();
            };
        };

        $date25 = $_POST['fecha2-5'];
        if (!empty($date25)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date25);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date25);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date25);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act2);
                $sql->execute();
                $sql->close();
            };
        };
    };

    if (!empty($act3)) {
        $date31 = $_POST['fecha3-1'];
        if (!empty($date31)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date31);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date31);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date31);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                $sql->execute();
                $sql->close();
            };
        };

        $date32 = $_POST['fecha3-2'];
        if (!empty($date32)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date32);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date32);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date32);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                $sql->execute();
                $sql->close();
            };
        };

        $date33 = $_POST['fecha3-3'];
        if (!empty($date33)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date33);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date33);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date33);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                $sql->execute();
                $sql->close();
            };
        };

        $date34 = $_POST['fecha3-4'];
        if (!empty($date34)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date34);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date34);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date34);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                $sql->execute();
                $sql->close();
            };
        };

        $date35 = $_POST['fecha3-5'];
        if (!empty($date35)) {
            $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
            $sql->bind_param("ss", $añoescolar, $date35);
            $sql->execute();
            $calendario = $sql->get_result();
            $sql->close();

            if ($calendario->num_rows != 0) {
                $calendario = $calendario->fetch_assoc();
                $sql = $database->prepare('SELECT cro.crctcodg FROM tbcroact AS cro WHERE cro.clsccodg = ? AND cro.crctacto = ?');
                $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                $sql->execute();
                $cronograma = $sql->get_result()->num_rows;
                $sql->close();

                if ($cronograma == 0) {
                    $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                    $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                    $sql->execute();
                    $sql->close();
                };
            } else {
                $sql = $database->prepare('INSERT INTO tbcalesc(añsccodg, clscdate) VALUES (?, ?)');
                $sql->bind_param("ss", $añoescolar, $date35);
                $sql->execute();
                $sql->close();

                $sql = $database->prepare('SELECT cal.clsccodg FROM tbcalesc AS cal WHERE cal.añsccodg = ? AND cal.clscdate = ?');
                $sql->bind_param("ss", $añoescolar, $date35);
                $sql->execute();
                $calendario = $sql->get_result()->fetch_assoc();
                $sql->close();

                $sql = $database->prepare('INSERT INTO tbcroact(clsccodg, crctacto) VALUES (?, ?)');
                $sql->bind_param("ss", $calendario['clsccodg'], $act3);
                $sql->execute();
                $sql->close();
            };
        };
    };
};

Cerrar_Conexion($database);
header("Location: ../../sistema/planificacion.php");
exit;
