<?php
require_once '../Service/funciones.php';
require_once '../Model/Alumno.php';
require_once '../Model/Asignatura.php';
require_once '../Model/Alumno_Asignatura.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$alumnos = [];
$asignaturas = [];
$devolver = [];
if ($metodo == 'GET') {
    include '../Service/metodoGET.php';
} else if ($metodo == 'POST') {
    include '../Service/metodoPOST.php';
} else if ($metodo == 'DELETE') {
    include '../Service/metodoDELETE.php';
} else if ($metodo == 'PUT') {
    include '../Service/metodoPUT.php';
}

setCabecera($codEstado, $mensaje);
if ($codEstado == 200) {
    echo json_encode($devolver);
}
