<?php
require_once "../Model/Asignatura.php";
$data['asignaturas'] = Asignatura::getAsignaturas();
include '../View/nuevoAlumnoAsignatura_view.php';