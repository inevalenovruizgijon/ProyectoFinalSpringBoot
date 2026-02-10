<?php
require_once '../Model/Asignatura.php'; 
require_once '../Model/Alumno_Asignatura.php'; 
$alumno_asignaturaAux = new Alumno_Asignatura("",$_GET['codigo']); 
$alumno_asignaturaAux->delete();  
$asignaturaAux = new Asignatura($_GET['codigo']); 
$asignaturaAux->delete();  
header("Location: ../Controller/verAsignaturas.php");  
?>