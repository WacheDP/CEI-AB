<?php

session_start();
if (!empty($_SESSION['sesion'])) {
    header("Location: ./sistema/inicio.php");
    exit;
};
