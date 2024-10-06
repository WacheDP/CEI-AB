<?php
$categoria = $_SESSION['categoria'];

switch ($categoria) {
    case "REPRESENTANTE":
        $representante = new Representante();
        $representante = $_SESSION['usuario'];
        $nivel = $representante->Verificar_Nivel_Seguridad();
        $foto = $representante->Verificar_Foto();
        $id = $representante->Verificar_Nombre();
        $nombreusuario = $representante->Verificar_Nombre_Usuario();
        $correo = $representante->Verificar_Correo();
        $cedula = $representante->Verificar_Cedula();
        $sebo = $representante->Verificar_Direccion();
        $parroquia = $sebo['parroquia'];
        $direccion = $sebo['direccion'];
        break;

    case "PERSONAL":
        $personal = new Personal();
        $personal = $_SESSION['usuario'];
        $nivel = $personal->Verificar_Nivel_Seguridad();
        $foto = $personal->Verificar_Foto();
        $id = $personal->Verificar_Nombre();
        $nombreusuario = $personal->Verificar_Nombre_Usuario();
        $correo = $personal->Verificar_Correo();
        $cedula = $personal->Verificar_Cedula();
        $sebo = $personal->Verificar_Direccion();
        $parroquia = $sebo['parroquia'];
        $direccion = $sebo['direccion'];
        break;

    case "REPRESENTANTE/PERSONAL":
    case "ADMINISTRADOR":
        $mixto = new Mixto();
        $mixto = $_SESSION['usuario'];
        $nivel = $mixto->Verificar_Nivel_Seguridad();
        $foto = $mixto->Verificar_Foto();
        $id = $mixto->Verificar_Nombre();
        $nombreusuario = $mixto->Verificar_Nombre_Usuario();
        $correo = $mixto->Verificar_Correo();
        $cedula = $mixto->Verificar_Cedula();
        $sebo = $mixto->Verificar_Direccion();
        $parroquia = $sebo['parroquia'];
        $direccion = $sebo['direccion'];
        break;
};
