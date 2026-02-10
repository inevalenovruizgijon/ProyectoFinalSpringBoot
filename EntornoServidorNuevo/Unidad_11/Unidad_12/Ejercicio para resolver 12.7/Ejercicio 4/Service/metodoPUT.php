<?php
//CAMBIAR CURSO
parse_str(file_get_contents("php://input"), $parametros);
$alumno = Alumno::getAlumnoByNombreNormal($parametros['nombre']);
if ($alumno) {
    $AuxAlumno = new Alumno($alumno->getMatricula(), $alumno->getNombre(), $alumno->getApellido(), $parametros['curso']);
    $AuxAlumno->update();
    $mensaje = "CAMBIO DE CURSO CORRECTAMENTE";
    $codEstado = 200;
} else {
    $mensaje = "ALUMNO NO ENCONTRADO";
    $codEstado = 404;
}
