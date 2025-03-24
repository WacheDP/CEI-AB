<?php
function Validar_Nivel($seccion)
{
    switch ($seccion) {
        case "Planificacion":
            if ($_SESSION['nivelseguridad'] < 8) {
                return true;
            } else {
                return false;
            };
            break;

        case "Crear y Editar Grupos":
            if ($_SESSION['nivelseguridad'] < 8) {
                return true;
            } else {
                return false;
            };
            break;

        case "Todos los niños":
            if ($_SESSION['nivelseguridad'] < 8) {
                return true;
            } else {
                return false;
            };
            break;
    };
};
