<?php
  require_once '../Model/Alumno.php'; 
  $data['alumno']=Alumno::getAlumnoById($_REQUEST['matricula']); 
  include '../View/actualizaAlumno_view.php'; 
?>