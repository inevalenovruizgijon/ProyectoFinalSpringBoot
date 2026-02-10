<?php
require_once '../Model/Alumno.php';

$alumnoAux = new alumno($_REQUEST['matricula'], $_POST['nombre'], $_POST['apellido'], $_POST['curso']);
$alumnoAux->update();

header("Location: ../Controller/index.php");
