<?php
require "../php/basedatos.php";
$busqueda = "%" . $_POST['filtro'] . "%";
$pos = $_POST['pos'];
$cedula = $_POST['cedula'];
$offset = ($pos - 1) * 5;
$html = "";
$limite = 5;
$total_niños = 0;
$total_nivel = 0;

date_default_timezone_set("America/Caracas");
$dehoy = date("Y-m-d");
$sql = $database->prepare('SELECT l.clsccodg, c.crctcodg FROM tbcalesc AS l, tbcroact AS c WHERE c.clsccodg = l.clsccodg AND l.clscdate = ? AND c.crctacto = "INSCRIPCIONES";');
$sql->bind_param("s", $dehoy);
$sql->execute();
$bandera = ($sql->get_result()->num_rows == 1) ? true : false;
$sql->close();

$cadena = "";
$cadena .= 'SELECT n.nñcedesc, n.nñprnomb, n.nñsgnomb, n.nñprapel, n.nñsgapel, n.nñgenero, n.nñfecnac,';
$cadena .= ' n.nñnacion, n.nñestado, n.nñperfil FROM tablniño AS n';
$cadena .= ' INNER JOIN tabparez AS p ON p.nñcedesc = n.nñcedesc ';
$cadena .= 'WHERE p.perscedi = ? AND ';
$cadena .= '(n.nñcedesc LIKE ? OR n.nñprnomb LIKE ? OR n.nñsgnomb LIKE ? ';
$cadena .= 'OR n.nñprapel LIKE ? OR n.nñsgapel LIKE ?) ';
$sql = $database->prepare($cadena);
$sql->bind_param("ssssss", $cedula, $busqueda, $busqueda, $busqueda, $busqueda, $busqueda);
$sql->execute();
$total_niños = $sql->get_result()->num_rows;
$total_nivel = ceil($total_niños / 5);
$sql->close();

$cadena .= 'ORDER BY n.nñcedesc ASC LIMIT ? OFFSET ?;';
$sql = $database->prepare($cadena);
$sql->bind_param("ssssssii", $cedula, $busqueda, $busqueda, $busqueda, $busqueda, $busqueda, $limite, $offset);
$sql->execute();
$niños = $sql->get_result();
$sql->close();

$html .= '<div id="tabs">';
$html .= '<div class="deck">';

while ($niño = $niños->fetch_assoc()) {
    if (htmlspecialchars($niño['nñgenero']) == "V") {
        $html .= '<div class="card carta bg-primary mb-3">';
    } else {
        $html .= '<div class="card carta rosa mb-3">';
    };

    $nacimiento = new DateTime(htmlspecialchars($niño['nñfecnac']));
    $hoy = new DateTime();
    $d = $hoy->diff($nacimiento);
    $year = $d->y;
    $mes = $d->m;
    $edad = $year . " años y " . $mes . " meses";

    $html .= '<div class="card-header"><img class="card-img-top" src="../assets/avatars/' . htmlspecialchars($niño['nñperfil']) . '" alt="foto de perfil"></div>';
    $html .= '<div class="card-body">';
    $html .= '<h5 class="card-title"><u><b>Cedula Escolar:</b></u> ' . htmlspecialchars($niño['nñcedesc']) . '</h5>';
    $html .= '<p class="card-text text-black">';
    $html .= '<u><b>Nombres:</b></u> ' . htmlspecialchars($niño['nñprnomb']) . ' ' . htmlspecialchars($niño['nñsgnomb']) . ' <br>';
    $html .= '<u><b>Apellidos:</b></u> ' . htmlspecialchars($niño['nñprapel']) . ' ' . htmlspecialchars($niño['nñsgapel']) . ' <br>';
    $html .= '<u><b>Edad:</b></u> ' . $edad . ' <br>';

    if (htmlspecialchars($niño['nñnacion']) == "V") {
        $html .= (htmlspecialchars($niño['nñgenero']) == "V") ? 'Venezolano' : 'Venezolana';
    } else {
        $html .= (htmlspecialchars($niño['nñgenero']) == "V") ? 'Extranjero' : 'Extranjera';
    };

    $html .= '</p>';
    $html .= '</div>';
    $html .= '<div class="card-body">';

    if ($bandera && htmlspecialchars($niño['nñestado']) == "Habilitado") {
        $html .= '<a href="./inscripciones.php?niño=' . htmlspecialchars($niño['nñcedesc']) . '" class="btn btn-success">';
        $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">';
        $html .= '<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />';
        $html .= '<path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />';
        $html .= '</svg></a>';
    };

    $html .= '<a href="./CRUD/niños.php?niño=' . htmlspecialchars($niño['nñcedesc']) . '" class="btn btn-warning">';
    $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">';
    $html .= '<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />';
    $html .= '<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />';
    $html .= '</svg></a>';

    if (htmlspecialchars($niño['nñestado']) != "Deshabilitado") {
        $html .= '<button onclick="Alerta(\'' . htmlspecialchars($niño['nñcedesc']) . '\');" class="btn btn-danger">';
        $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">';
        $html .= '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />';
        $html .= '<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />';
        $html .= '</svg></button>';
    };

    $html .= '</div>';
    $html .= '<p class="card-text"><small class="text-muted">Estado: ' . htmlspecialchars($niño['nñestado']) . '</small></p>';

    $html .= '</div>';
};

$html .= '</div>';
$html .= '</div>';

$html .= '<nav aria-label="Page navigation example">';
$html .= '<ul class="pagination justify-content-center">';
$html .= '<li class="page-item"><button class="page-link" onclick="Tuyos(1);">Primero</button></li>';

if ($total_nivel <= 3) {
    for ($i = 1; $i <= $total_nivel; $i++) {
        if ($i == $pos) {
            $html .= '<li class="page-item active"><button class="page-link" onclick="Tuyos(' . $i . ');">' . $i  . '</button></li>';
        } else {
            $html .= '<li class="page-item"><button class="page-link" onclick="Tuyos(' . $i  . ');">' . $i . '</button></li>';
        };
    };
} else {
    if ($pos > ($total_nivel - 2)) {
        for ($i = ($total_nivel - 2); $i <= $total_nivel; $i++) {
            if ($i == $pos) {
                $html .= '<li class="page-item active"><button class="page-link" onclick="Tuyos(' . $i . ');">' . $i  . '</button></li>';
            } else {
                $html .= '<li class="page-item"><button class="page-link" onclick="Tuyos(' . $i  . ');">' . $i . '</button></li>';
            }
        }
    } elseif ($pos < 3) {
        for ($i = 1; $i <= 3; $i++) {
            if ($i == $pos) {
                $html .= '<li class="page-item active"><button class="page-link" onclick="Tuyos(' . $i . ');">' . $i  . '</button></li>';
            } else {
                $html .= '<li class="page-item"><button class="page-link" onclick="Tuyos(' . $i  . ');">' . $i . '</button></li>';
            }
        }
    } else {
        for ($i = ($pos - 1); $i <= ($pos + 1); $i++) {
            if ($i == $pos) {
                $html .= '<li class="page-item active"><button class="page-link" onclick="Tuyos(' . $i . ');">' . $i  . '</button></li>';
            } else {
                $html .= '<li class="page-item"><button class="page-link" onclick="Tuyos(' . $i  . ');">' . $i . '</button></li>';
            }
        }
    }
};

$html .= '<li class="page-item"><button class="page-link" onclick="Tuyos(' . $total_nivel . ');">Ultimo</button></li>';
$html .= '</ul></nav>';

Cerrar_Conexion($database);
echo $html;
