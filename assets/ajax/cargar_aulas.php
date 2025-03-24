<?php
require "../php/basedatos.php";

$turno = $_POST['turno'];

$sql = $database->prepare('SELECT a.aulacodg, a.aulanomb FROM tablaula AS a INNER JOIN detlaula AS d on d.aulacodg = a.aulacodg WHERE a.aulanomb LIKE "Aula%" AND d.daulastt = "Habilitado" AND NOT EXISTS (SELECT 1 FROM tablamat AS m WHERE m.aulacodg = a.aulacodg AND m.matturno = ?)');
$sql->bind_param("s", $turno);
$sql->execute();
$aulas = $sql->get_result();
$sql->close();

$html = "";
$html .= '<option value="">Selecciona el Salón</option>';

if (!empty($turno)) {
    if ($aulas->num_rows == 0) {
        $html .= '<option value="">No Hay Salones Disponibles</option>';
    } else {
        while ($aula = $aulas->fetch_assoc()) {
            $html .= '<option value="' . htmlspecialchars($aula['aulacodg']) . '">' . htmlspecialchars($aula['aulanomb']) . '</option>';
        };
    };
};

Cerrar_Conexion($database);
echo $html;
