<?php
$conexion = new mysqli("localhost", "root", "", "abdatabase");
$conexion->set_charset("utf8");

if ($conexion->connect_errno) {
    echo '<script>alert("Error ' . $conexion->connect_error . '");</script>';
};
