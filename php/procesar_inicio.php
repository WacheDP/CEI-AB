<?php
require "./conexion.php";
require "./clases.php";

if (!empty($_POST['inicio-btn'])) {

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $sql = $conexion->prepare('SELECT usernom, persci, userclave FROM abuser WHERE usernom = ?');
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $exe = $sql->get_result();
    $sql->close();

    if ($exe->num_rows != 1) {
        $exe->free_result();
        require "./cerrar_conexion.php";
        echo '<script> alert("Este usuario no existe..."); window.location.href="../iniciar_sesion.php"; </script>';
        exit();
    } else {
        $comprobacion = $exe->fetch_assoc();
        $exe->free_result();

        if (password_verify($contraseña, $comprobacion['userclave'])) {

            $sql = $conexion->prepare('SELECT perscatg FROM abpers WHERE persci = ?');
            $sql->bind_param("s", $comprobacion['persci']);
            $sql->execute();
            $exe = $sql->get_result();
            $sql->close();
            $categoria = $exe->fetch_assoc();
            $exe->free_result();

            switch ($categoria['perscatg']) {
                case "REPRESENTANTE":
                    $representante = new Representante();
                    $representante->Cargar_Datos($comprobacion['usernom']);

                    session_start();
                    $_SESSION['usuario'] = $representante;
                    $_SESSION['categoria'] = $representante->Verificar_Categoria();

                    require "./cerrar_conexion.php";
                    header("Location: ../sistema.php");
                    exit();
                    break;

                case "PERSONAL":
                    $personal = new Personal();
                    $personal->Cargar_Datos($comprobacion['usernom']);

                    session_start();
                    $_SESSION['usuario'] = $personal;
                    $_SESSION['categoria'] = $personal->Verificar_Categoria();

                    require "./cerrar_conexion.php";
                    header("Location: ../sistema.php");
                    exit();
                    break;

                case "REPRESENTANTE/PERSONAL":
                case "ADMINISTRADOR":
                    $mixto = new Mixto();
                    $mixto->Cargar_Datos($comprobacion['usernom']);

                    session_start();
                    $_SESSION['usuario'] = $mixto;
                    $_SESSION['categoria'] = $mixto->Verificar_Categoria();

                    require "./cerrar_conexion.php";
                    header("Location: ../sistema.php");
                    exit();
                    break;
            };
        } else {
            require "./cerrar_conexion.php";
            echo '<script> alert("Contraseña incorrecta..."); window.location.href="../iniciar_sesion.php"; </script>';
            exit();
        };
    };
} else {
    require "./cerrar_conexion.php";
    header("Location: ../iniciar_sesion.php");
    exit();
};
