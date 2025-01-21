<?php
require "./basedatos.php";

if (isset($_POST['btn'])) {
    $usuario = $_POST['ID'];
    $contraseña = $_POST['password'];

    $sql = $database->prepare('SELECT u.*, p.perscatg, p.persfoto FROM tabluser AS u, tablpers AS p WHERE p.perscedi = u.perscedi AND (u.username = ? OR u.usercorr = ?)');
    $sql->bind_param("ss", $usuario, $usuario);
    $sql->execute();
    $result = $sql->get_result();
    $sql->close();

    $alerta = "";
    if ($result->num_rows != 1) {
        Cerrar_Conexion($database);
        $alerta = '<script>alert("El usuario no existe...");window.location.href = "../../home.php";</script>';
        echo $alerta;
        exit;
    } else {
        $result = $result->fetch_assoc();

        if ($result['userstat'] != "Habilitado") {
            Cerrar_Conexion($database);
            $alerta = '<script>alert("El usuario no esta disponible...");window.location.href = "../../home.php";</script>';
            echo $alerta;
            exit;
        };

        if (password_verify($contraseña, $result['userpawo'])) {
            session_start();
            $_SESSION['sesion'] = true;
            $_SESSION['usuario'] = $result['username'];
            $_SESSION['cedula'] = $result['perscedi'];
            $_SESSION['correo'] = $result['usercorr'];
            $_SESSION['nivelseguridad'] = $result['usercode'];
            $_SESSION['perfil'] = $result['persfoto'];
            $_SESSION['categoria'] = $result['perscatg'];

            Cerrar_Conexion($database);
            header("Location: ../../sistema/inicio.php");
            exit;
        } else {
            Cerrar_Conexion($database);
            $alerta = '<script>alert("La contraseña es incorrecta...");window.location.href = "../../home.php";</script>';
            echo $alerta;
            exit;
        };
    };
} else {
    Cerrar_Conexion($database);
    header("Location: ../../home.php");
    exit;
};
