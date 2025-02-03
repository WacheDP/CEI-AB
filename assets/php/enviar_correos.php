<?php

if (isset($_POST['btn'])) {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $mensaje = $_POST['message'];
    $receptor = "wacheparra21@gmail.com";
    $asunto = "Mensaje de la Página Principal";
    $header = "From: " . $email . "\r\n";
    $header .= "Reply-to: " . $email . "\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();

    mail($receptor, $asunto, $mensaje, $header);
};

header("Location: ../../index.php");
exit;
