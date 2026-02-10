<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once "../Model/Alumno_Asignatura.php";
if (isset($_GET['matricula'])) {
    $_SESSION['matricula'] = $_GET['matricula'];
}
$data['asignaturas'] = Alumno_Asignatura::getAsignaturaBymatricula($_SESSION['matricula']);
include '../View/asignaturaAlumno_view.php';