<?php
session_start();
if (empty($_SESSION['sesion'])) {
    header("Location: ../index.php");
    exit;
};
