<?php
require_once '../Model/Asignatura.php'; 
$AsignaturaAux = new Asignatura("",$_POST['nombre']); 
$AsignaturaAux->insert();  
header("Location: ../Controller/verAsignaturas.php"); 
?>