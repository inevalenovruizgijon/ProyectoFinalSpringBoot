<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Alumno_Asignatura.php'; 
$alumno_asignaturaAux = new Alumno_Asignatura($_SESSION['matricula'],$_GET['codigo']); 
$alumno_asignaturaAux->delete();  
header("Location: ../Controller/asignaturaAlumno.php");  
?>