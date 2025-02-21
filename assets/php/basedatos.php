<?php
$database = new mysqli("localhost", "root", "", "abdatabase");

if ($database->connect_error) {
    die("Conexion fallida: " . $database->connect_error);
};

if (!function_exists("Cerrar_Conexion")) {
    function Cerrar_Conexion($database)
    {
        $database->close();
    };
};
