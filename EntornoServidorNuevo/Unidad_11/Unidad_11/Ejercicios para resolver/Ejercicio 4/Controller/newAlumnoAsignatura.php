<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Alumno_Asignatura.php'; 
$Alumno_AsignaturaAux = new Alumno_Asignatura($_SESSION['matricula'],$_GET['codigo']); 
$Alumno_AsignaturaAux->insert();
header("Location: ../Controller/asignaturaAlumno.php"); 
?>