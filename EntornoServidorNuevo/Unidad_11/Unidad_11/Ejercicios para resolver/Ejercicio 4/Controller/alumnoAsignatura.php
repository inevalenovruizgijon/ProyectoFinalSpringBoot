<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once "../Model/Alumno_Asignatura.php";
if (isset($_GET['codigo'])) {
    $_SESSION['codigo'] = $_GET['codigo'];
}
$data['alumnos'] = Alumno_Asignatura::getAlumnoBycodigo($_SESSION['codigo']);
include '../View/alumnoAsignatura_view.php';