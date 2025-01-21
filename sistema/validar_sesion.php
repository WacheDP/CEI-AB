<?php
session_start();
if (empty($_SESSION['sesion'])) {
    header("Location: ../home.php");
    exit;
};
