<?php
require "./conexion.php";
require "./clases.php";

if (!empty($_POST['registro'])) {

    $cedula = $_POST['ci'];
    $usuario = $_POST['user'];
    $contraseña = $_POST['clave'];
    $verificacion = $_POST['clave2'];

    $fecha = $_POST['fechanacer'];
    list($year, $mes, $dia) = explode('-', $fecha);

    if (checkdate($mes, $dia, $year)) {
        $hoy = date('Y');
        $lim1 = $hoy - 100;
        $lim2 = $hoy - 18;

        if ($year > $lim2 || $year <= $lim1) {
            require "./cerrar_conexion.php";
            echo '<script> alert("Esa edad no es válida..."); window.location.href = "../registro.php"; </script>';
            exit();
        } else {
            $sql = $conexion->prepare('SELECT persci FROM abpers WHERE persci = ?');
            $sql->bind_param("s", $cedula);
            $sql->execute();
            $exe = $sql->get_result();
            $sql->close();

            if ($exe->num_rows != 0) {
                $exe->free_result();
                require "./cerrar_conexion.php";
                echo '<script> alert("La cedula ya está registrada..."); window.location.href = "../registro.php"; </script>';
                exit();
            } else {
                $exe->free_result();
                $sql = $conexion->prepare('SELECT usernom FROM abuser WHERE usernom = ?');
                $sql->bind_param("s", $usuario);
                $sql->execute();
                $exe = $sql->get_result();
                $sql->close();

                if ($exe->num_rows != 0) {
                    $exe->free_result();
                    require "./cerrar_conexion.php";
                    echo '<script> alert("Ese usuario ya está registrado..."); window.location.href = "../registro.php"; </script>';
                    exit();
                } else {
                    $exe->free_result();

                    if ($contraseña != $verificacion) {
                        require "./cerrar_conexion.php";
                        echo '<script> alert("Las contraseñas deben ser iguales..."); window.location.href = "../registro.php"; </script>';
                        exit();
                    } else {

                        if ($_POST['registro'] == "Registrar Representante") {

                            $representante = new Representante();

                            $datos = [
                                "cedula" => $cedula,
                                "pnombre" => $_POST['nom1'],
                                "snombre" => $_POST['nom2'],
                                "papellido" => $_POST['ape1'],
                                "sapellido" => $_POST['ape2'],
                                "telefono1" => $_POST['telf1'],
                                "telefono2" => $_POST['telf2'],
                                "telefono3" => $_POST['telf3'],
                                "fe" => $_POST['fe'],
                                "fechanacimiento" => $_POST['fechanacer'],
                                "lugarnacimiento" => $_POST['lugarnacer'],
                                "nacionalidad" => $_POST['nacionalidad'],
                                "usuario" => $usuario,
                                "correo" => $_POST['email'],
                                "contraseña" => $contraseña,
                                "titulo" => $_POST['profesion'],
                                "trabajo" => $_POST['ocupacion'],
                                "lugartrabajo" => $_POST['lugartrabajo'],
                                "codigoparroquia" => $_POST['parroquia'],
                                "direccion" => $_POST['dir']
                            ];

                            $representante->Registrar_Representante($datos);
                            session_start();
                            $_SESSION['usuario'] = $representante;
                            $_SESSION['categoria'] = $representante->Verificar_Categoria();

                            require "./cerrar_conexion.php";
                            header("Location: ../sistema.php");
                            exit();
                        };

                        if ($_POST['registro'] == "Registrar Personal") {

                            $personal = new Personal();

                            $datos = [
                                "cedula" => $cedula,
                                "pnombre" => $_POST['nom1'],
                                "snombre" => $_POST['nom2'],
                                "papellido" => $_POST['ape1'],
                                "sapellido" => $_POST['ape2'],
                                "telefono1" => $_POST['telf1'],
                                "telefono2" => $_POST['telf2'],
                                "telefono3" => $_POST['telf3'],
                                "fe" => $_POST['fe'],
                                "fechanacimiento" => $_POST['fechanacer'],
                                "lugarnacimiento" => $_POST['lugarnacer'],
                                "nacionalidad" => $_POST['nacionalidad'],
                                "usuario" => $usuario,
                                "correo" => $_POST['email'],
                                "contraseña" => $contraseña,
                                "codigocargo" => $_POST['cargo'],
                                "tiemposervicio" => $_POST['tiempo'],
                                "codigoparroquia" => $_POST['parroquia'],
                                "direccion" => $_POST['dir']
                            ];

                            $personal->Registrar_Personal($datos);
                            session_start();
                            $_SESSION['usuario'] = $personal;
                            $_SESSION['categoria'] = $personal->Verificar_Categoria();
                            $_SESSION['nivelseguridad'] = $personal->Verificar_Nivel_Seguridad();

                            require "./cerrar_conexion.php";
                            header("Location: ../sistema.php");
                            exit();
                        };
                    };
                };
            };
        };
    } else {
        require "./cerrar_conexion.php";
        echo '<script> alert("Esa edad no es válida..."); window.location.href = "../registro.php"; </script>';
        exit();
    };
} else {
    require "./cerrar_conexion.php";
    header("Location: ../registro.php");
    exit();
};
