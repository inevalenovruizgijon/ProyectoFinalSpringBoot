<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Alumno_Asignatura.php'; 
$alumno_asignaturaAux = new Alumno_Asignatura($_GET['matricula'],$_SESSION['codigo']); 
$alumno_asignaturaAux->delete();  
header("Location: ../Controller/alumnoAsignatura.php");  
?>