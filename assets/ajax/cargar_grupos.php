<?php
require "../php/basedatos.php";

$añoescolar = $_POST['periodo'];
$turno = $_POST['turno'];

$sql = $database->prepare('SELECT m.matcodig, a.aulanomb, m.matgrupo, m.matsecco, m.matturno, m.añsccodg FROM tablamat AS m, tablaula AS a WHERE m.aulacodg = a.aulacodg AND m.añsccodg = ? AND m.matturno = ?');
$sql->bind_param("ss", $añoescolar, $turno);
$sql->execute();
$grupos = $sql->get_result();
$sql->close();

$html = "";
while ($materia = $grupos->fetch_assoc()) {
    $html .= '<div class="row">';
    $html .= '<div class="card text-white bg-secondary mb-3" style="max-width: 18rem; margin-left: 30px;">';
    $html .= '<div class="card-header">Grupo ' . htmlspecialchars($materia['matgrupo']) . '</div>';
    $html .= '<div class="card-body text-warning">';
    $html .= '<h5 class="card-title">Sección ' . htmlspecialchars($materia['matsecco']) . '</h5>';
    $html .= '<p class="card-text">Turno ' . htmlspecialchars($materia['matturno']) . '</p>';
    $html .= '<p class="card-text">Año Escolar ' . htmlspecialchars($materia['añsccodg']) . '</p>';
    $html .= '<p class="card-text">Salón: ' . htmlspecialchars($materia['aulanomb']) . '</p>';
    $html .= '<div class="botones">';
    $html .= '<button type="button" class="btn btn-dark">';
    $html .= '<a href="./CRUD/grupos&secciones.php">';
    $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">';
    $html .= '<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />';
    $html .= '</svg></a></button>';
    $html .= '<button type="button" class="btn btn-danger">';
    $html .= '<a href="../assets/php/borrar_grupo.php">';
    $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">';
    $html .= '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />';
    $html .= '<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />';
    $html .= '</svg></a></button></div></div></div>';

    $sql = $database->prepare("SELECT q.perscedi, q.persnom1, q.persape1, q.persnaco FROM detmatpo AS d, tabperso AS p, tablpers AS q WHERE p.perscedi = q.perscedi AND d.persoced = p.persoced AND d.matcodig = ?");
    $sql->bind_param("s", $materia['matcodig']);
    $sql->execute();
    $profesores = $sql->get_result();
    $sql->close();

    $html .= '<div class="card text-white bg-secondary mb-3" style="max-width: 70%; margin-left: 20px;">';
    $html .= '<div class="card-header">Docentes</div>';
    $html .= '<div class="card-body">';
    $html .= '<ul class="list-group list-group-flush">';

    while ($docente = $profesores->fetch_assoc()) {
        $html .= '<li class="list-group-item list-group-item-action list-group-item-secondary">';
        $html .= htmlspecialchars($docente['persnaco']) . '-' . htmlspecialchars($docente['perscedi']) . ' ' . htmlspecialchars($docente['persnom1']) . ' ' . htmlspecialchars($docente['persape1']) . '</li>';
    }

    $html .= '</ul></div></div></div>';
}

Cerrar_Conexion($database);
echo $html;
