<?php
require "./basedatos.php";

if (isset($_POST['btn'])) {
    //Obligatorio
    $representante = $_POST['cedula-representante'];
    $cedula = $_POST['ced-esc'];
    $relacion = $_POST['parentezco'];
    $sexo = $_POST['sexo'];
    $convivencia = $_POST['convive'] ? true : false;
    $nom1 = strtolower($_POST['nom1']);
    $ape1 = strtolower($_POST['ape1']);
    $nacimiento = $_POST['fecnac'];
    $nacionalidad = $_POST['nacionalidad'];
    $direccion = "";
    $parroquia = "";
    $alergias = $_POST['alergias'] == "SI";
    $atencion_medica = $_POST['atencion_medica'] == "SI";
    $convulsiones = $_POST['convulsiones'] == "SI";
    $sae = $_POST['sae'] == "SI";
    $habitantes = $_POST['habitantes'];
    $turno_alterno = $_POST['turno_alterno'];
    $hermanos = 0;
    $perfil = "";

    //Opcional
    $nom2 = strtolower($_POST['nom2']);
    $ape2 = strtolower($_POST['ape2']);
    $origen = $_POST['lugnac'];
    $vehiculo = $_POST['viaje'];
    $doctor = $_POST['doctor'];
    $comida = $_POST['alergia_comida'];
    $medicina = $_POST['alergia_medicina'];
    $limitaciones = $_POST['limitaciones'];
    $motivo_convulsion = $_POST['convulsiones_razon'];
    $motivo_sae = $_POST['sae_razon'];
    $deporte = $_POST['deportes'];
    $fin_semana = $_POST['fin_semana'];
    $observacion = $_POST['observacion'];

    $sql = $database->prepare('SELECT n.nñcedesc FROM tablniño AS n WHERE n.nñcedesc = ?');
    $sql->bind_param("s", $cedula);
    $sql->execute();
    $cedulas = $sql->get_result()->num_rows;
    $sql->close();

    if ($cedulas != 0) {
        $html = "";
        $html .= '<script>alert("Esta cedula ya existe...");';
        $html .= 'window.location.href = "../../sistema/registroniño.php";</script>';

        Cerrar_Conexion($database);
        echo $html;
        exit;
    };

    $sebo = false;
    date_default_timezone_set("America/Caracas");
    $fecha = DateTime::createFromFormat("Y-m-d", $nacimiento);
    $hoy = new DateTime();

    if ($fecha > $hoy) {
        $sebo = true;
    };

    $edad = $hoy->diff($fecha)->y;

    if ($edad < 1 || $edad >= 6) {
        $sebo = true;
    };

    if ($sebo) {
        $html = "";
        $html .= '<script>alert("No tiene la edad apropiada...");';
        $html .= 'window.location.href = "../../sistema/registroniño.php";</script>';

        Cerrar_Conexion($database);
        echo $html;
        exit;
    };

    if ($_FILES['foto']['error'] != UPLOAD_ERR_OK) {
        $html = "";
        $html .= '<script>alert("Hubo un error al cargar la foto de perfil...");';
        $html .= 'window.location.href = "../../sistema/registroniño.php";</script>';

        Cerrar_Conexion($database);
        echo $html;
        exit;
    };

    $perfil = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino = "../avatars/" . basename($perfil);
    move_uploaded_file($ruta, $destino);

    if ($convivencia) {
        $sql = $database->prepare('SELECT p.parrqcod, p.persdire FROM tablpers AS p WHERE p.perscedi = ?');
        $sql->bind_param("s", $representante);
        $sql->execute();
        $doxeo = $sql->get_result()->fetch_assoc();
        $direccion = $doxeo['persdire'];
        $parroquia = $doxeo['parrqcod'];
    } else {
        $direccion = $_POST['direccion'];
        $parroquia = $_POST['parroquia'];
    };

    $campos = [];
    $valores = [];
    $index = "";
    $campos[] = "nñcedesc";
    $valores[] = $cedula;
    $index .= "s";
    $campos[] = "parrqcod";
    $valores[] = $parroquia;
    $index .= "s";
    $campos[] = "nñprnomb";
    $valores[] = $nom1;
    $index .= "s";

    if (!empty($nom2)) {
        $campos[] = "nñsgnomb";
        $valores[] = $nom2;
        $index .= "s";
    };

    $campos[] = "nñprapel";
    $valores[] = $ape1;
    $index .= "s";

    if (!empty($ape2)) {
        $campos[] = "nñsgapel";
        $valores[] = $ape2;
        $index .= "s";
    };

    $campos[] = "nñgenero";
    $valores[] = $sexo;
    $index .= "s";
    $campos[] = "nñfecnac";
    $valores[] = $nacimiento;
    $index .= "s";
    $campos[] = "nñnacion";
    $valores[] = $nacionalidad;
    $index .= "s";

    if (!empty($origen)) {
        $campos[] = "nñlugnac";
        $valores[] = $origen;
        $index .= "s";
    };

    $campos[] = "nñdirecc";
    $valores[] = $direccion;
    $index .= "s";

    $sql = $database->prepare('SELECT p.nñcedesc FROM tabparez AS p WHERE p.perscedi = ?');
    $sql->bind_param("s", $representante);
    $sql->execute();
    $num = $sql->get_result()->num_rows;
    $sql->close();

    if ($num != 0) {
        $hermanos = $num;

        $sql = $database->prepare('SELECT p.nñcedesc FROM tabparez AS p WHERE p.perscedi = ?');
        $sql->bind_param("s", $representante);
        $sql->execute();
        $niños = $sql->get_result();
        $sql->close();

        while ($niño = $niños->fetch_assoc()) {
            $sql = $database->prepare('UPDATE tablniño AS n SET n.nñherman = ? WHERE n.nñcedesc = ?');
            $sql->bind_param("is", $hermanos, $niño['nñcedesc']);
            $sql->execute();
            $sql->close();
        };

        $campos[] = "nñherman";
        $valores[] = $hermanos;
        $index .= "i";
    };

    if (!empty($vehiculo)) {
        $campos[] = "nñtransp";
        $valores[] = $vehiculo;
        $index .= "s";
    };

    $campos[] = "nñperfil";
    $valores[] = $perfil;
    $index .= "s";

    $sql = $database->prepare('INSERT INTO tablniño(' . implode(", ", $campos) . ') VALUES (' . implode(", ", array_fill(0, count($valores), "?")) . ')');
    $sql->bind_param($index, ...$valores);
    $sql->execute();
    $sql->close();

    $campos = [];
    $valores = [];
    $index = "";
    $campos[] = "nñsacodg";
    $valores[] = $cedula;
    $index .= "s";
    $campos[] = "nñcedesc";
    $valores[] = $cedula;
    $index .= "s";

    if (!empty($doctor)) {
        $campos[] = "nñsadoct";
        $valores[] = $doctor;
        $index .= "s";
    };

    $campos[] = "nñsaallg";
    $valores[] = $alergias;
    $index .= "s";

    if (!empty($comida)) {
        $campos[] = "nñsafood";
        $valores[] = $comida;
        $index .= "s";
    };

    if (!empty($medicina)) {
        $campos[] = "nñsamedc";
        $valores[] = $medicina;
        $index .= "s";
    };

    $campos[] = "nñsaatmd";
    $valores[] = $atencion_medica;
    $index .= "s";

    if (!empty($limitaciones)) {
        $campos[] = "nñsalimt";
        $valores[] = $limitaciones;
        $index .= "s";
    };

    $campos[] = "nñsavuls";
    $valores[] = $convulsiones;
    $index .= "s";

    if (!empty($motivo_convulsion)) {
        $campos[] = "nñsarazo";
        $valores[] = $motivo_convulsion;
        $index .= "s";
    };

    $campos[] = "nñsa_sae";
    $valores[] = $sae;
    $index .= "s";

    if (!empty($motivo_sae)) {
        $campos[] = "nñsarsae";
        $valores[] = $motivo_sae;
        $index .= "s";
    };

    $campos[] = "nñsahabt";
    $valores[] = $habitantes;
    $index .= "i";
    $campos[] = "nñsatual";
    $valores[] = $turno_alterno;
    $index .= "s";

    if (!empty($deporte)) {
        $campos[] = "nñsadepo";
        $valores[] = $deporte;
        $index .= "s";
    };

    if (!empty($fin_semana)) {
        $campos[] = "nñsaplay";
        $valores[] = $fin_semana;
        $index .= "s";
    };

    if (!empty($observacion)) {
        $campos[] = "nñsaobsv";
        $valores[] = $observacion;
        $index .= "s";
    };

    $sql = $database->prepare('INSERT INTO tbniñosa(' . implode(", ", $campos) . ') VALUES (' . implode(", ", array_fill(0, count($valores), "?")) . ')');
    $sql->bind_param($index, ...$valores);
    $sql->execute();
    $sql->close();

    $sql = $database->prepare('INSERT INTO tabparez(nñcedesc, perscedi, parztype, parzvvjt) VALUES (?, ?, ?, ?)');
    $sql->bind_param("ssss", $cedula, $representante, $relacion, $convivencia);
    $sql->execute();
    $sql->close();

    $sql = $database->prepare('SELECT p.perscatg FROM tablpers AS p WHERE p.perscedi = ?');
    $sql->bind_param("s", $representante);
    $sql->execute();
    $categoria = $sql->get_result()->fetch_assoc();
    $sql->close();

    if ($categoria['perscatg'] == "PERSONAL") {
        $sql = $database->prepare('UPDATE tablpers AS p SET p.perscatg = "PERSONAL/REPRESENTANTE" WHERE p.perscedi = ?');
        $sql->bind_param("s", $representante);
        $sql->execute();
        $sql->close();
    };

    Cerrar_Conexion($database);
    header("Location: ../../sistema/tus_niños.php");
    exit;
} else {
    Cerrar_Conexion($database);
    header("Location: ../../sistema/registroniño.php");
    exit;
};
