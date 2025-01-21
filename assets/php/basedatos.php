<?php
$database = new mysqli("localhost", "root", "", "abdatabase");

if ($database->connect_error) {
    die("Conexion fallida: " . $database->connect_error);
};

function Cerrar_Conexion($database)
{
    $database->close();
};
