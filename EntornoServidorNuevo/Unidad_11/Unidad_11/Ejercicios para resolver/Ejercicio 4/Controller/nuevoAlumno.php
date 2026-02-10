<?php
if (!isset($matricula)) {
    $data ['matricula'] = "";
    $data ['nombre'] = "";
    $data ['apellido'] = "";
    $data ['curso'] = "";
    $data['mensaje'] = "";
}
include '../View/nuevoAlumno_view.php';
