<?php
//BORRAR ALUMNO
parse_str(file_get_contents("php://input"), $parametros);
$alumno = Alumno::getAlumnoByNombreNormal($parametros['nombre']);
if ($alumno) {
    $alumno->delete();
    $mensaje = "ALUMNO BORRADO CORRECTAMENTE";
    $codEstado = 200;
} else {
    $mensaje = "ALUMNO NO ENCONTRADO";
    $codEstado = 404;
}
