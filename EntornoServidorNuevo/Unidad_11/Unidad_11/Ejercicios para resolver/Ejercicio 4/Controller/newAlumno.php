<?php
require_once '../Model/Alumno.php';
$AlumnoAux = new Alumno($_POST['matricula'], $_POST['nombre'], $_POST['apellido'], $_POST['curso']);
if ($AlumnoAux->insert()) {
    header("Location: ../Controller/index.php");
} else {
    $data['matricula'] = $_POST['matricula'];
    $data['nombre'] = $_POST['nombre'];
    $data['apellido'] = $_POST['apellido'];
    $data['curso'] = $_POST['curso'];
    $data['mensaje'] = "No se puede introducir un alumno, matricula ya existente";
    include '../View/nuevoAlumno_view.php';
}
