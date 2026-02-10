<?php
require_once '../Model/Alumno.php'; 
require_once '../Model/Alumno_Asignatura.php'; 
$alumno_asignaturaAux = new Alumno_Asignatura($_GET['matricula'],""); 
$alumno_asignaturaAux->delete();  
$alumnoAux = new Alumno($_GET['matricula']); 
$alumnoAux->delete();  
header("Location: ../Controller/index.php");  
?>