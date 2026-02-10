<?php
require_once '../Service/funciones.php';
if (session_status() == PHP_SESSION_NONE) session_start();
$url = "http://localhost/Entorno_Servidor/Unidad_12/Ejercicio%20para%20resolver%2012.7/Ejercicio%204/Service/service.php";

?>
<style>
    /* Contenedor de mensajes de estado */
.container-mensaje {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.card-estado {
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    min-width: 300px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.estado-ok { 
    background-color: #e8f5e9; 
    color: #2e7d32; 
    border-color: #2e7d32; 
}

.estado-error { 
    background-color: #ffebee; 
    color: #c62828; 
    border-color: #c62828; 
}

.card-estado .codigo {
    font-size: 2rem;
    font-weight: bold;
    display: block;
}

/* Tablas */
.table-container {
    width: 90%;
    max-width: 900px;
    margin: 20px auto;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

.tabla-api {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

.tabla-api thead {
    background-color: #00703c;
    color: white;
}

.tabla-api th, .tabla-api td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.tabla-api tr:hover { background-color: #f1f8f4; }

.badge-curso {
    background: #e1f5fe;
    color: #0288d1;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: bold;
}

/* Botón Volver */
.center { text-align: center; margin: 30px; }

.btn-nav {
    text-decoration: none;
    background: #f07d00;
    color: white !important;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-nav:hover { background: #d67000; transform: scale(1.05); }
</style>
<?php

// FILTRA CURSO
if (isset($_REQUEST['filtraCurso'])) { 
    $parametros = '?curso='. urlencode($_REQUEST['curso']); 
    mostrarDatosAlumnos($url, $parametros); 
// FILTRA NOMBRE
} else if (isset($_REQUEST['filtraNombre'])) { 
    $parametros = "?nombre=" . urlencode($_REQUEST['nombre']); 
    mostrarDatosAlumnos($url, $parametros);
// FILTRO ALUMNO 
}else if (isset($_REQUEST['filtraAlumno'])) { 
    $parametros = "?nombreAlumno=" . urlencode($_REQUEST['nombreAlumno']); 
    mostrarDatosAsignaturas($url, $parametros);         
// MATRICULAR ALUMNO EN ASIGNATURA
} else if (isset($_REQUEST['insertar'])) { 
    $datos = ["nombre"=>$_REQUEST['nombre'],"id"=>$_REQUEST['id']]; 
    pideServicio($url, $datos, "POST"); 
// BORRA ALUMNO
} else if (isset($_REQUEST['borrar'])) { 
    $datos = ["nombre" =>  $_REQUEST['nombre']]; 
    pideServicio($url, $datos, "DELETE"); 
// CAMBIAR DE GRUPO
} else if (isset($_REQUEST['cambiar'])) { 
    $datos = ["nombre" =>  $_REQUEST['nombre'], "curso" =>  $_REQUEST['curso']]; 
    pideServicio($url, $datos, "PUT"); 
} 
