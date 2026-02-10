<?php
if (isset($_REQUEST['nombre']) || isset($_REQUEST['curso'])) {
    // NOMBRE 
    if (isset($_REQUEST['nombre'])) {
        $alumnos = Alumno::getAlumnoByNombre($_REQUEST['nombre']);
        // AQUI SE PUEDE MODIFICAR Y PONER UN CONDICIONAL DE $ALUMNO
        if (count($alumnos) == 0) {
            $mensaje = "NO SE HAN ENCONTRADO NINGUN ALUMNO CON LA CADENA " . $_REQUEST['nombre'];
            $codEstado = 404;
        }
        // CURSO
    } else if (isset($_REQUEST['curso'])) {
        $alumnos = Alumno::getAlumnoByGrupo($_REQUEST['curso']);
        if (count($alumnos) == 0) {
            $mensaje = "NO SE HAN ENCONTRADO NINGUN ALUMNO CON EL CURSO " . $_REQUEST['curso'];
            $codEstado = 404;
        }
    }
    $devolver = $alumnos;
    // ASIGNATURAS DE ALUMNO
} else if (isset($_REQUEST['nombreAlumno'])) {
    if ($alumno = Alumno::getAlumnoByNombreNormal($_REQUEST['nombreAlumno'])) {
        if ($asignaturas = Alumno_Asignatura::getAsignaturaBymatricula($alumno->getMatricula())) {
            $mensaje = "ASIGNATURAS ENCONTRADAS CORRECTAMENTE";
            $codEstado = 200;
            $devolver = $asignaturas;
        } else {
            $mensaje = "ALUMNO CON EL NOMBRE " . $_REQUEST['nombreAlumno'] . " NO TIENE ASIGNATURAS";
            $codEstado = 404;
        }
    } else {
        $mensaje = "ALUMNO CON EL NOMBRE " . $_REQUEST['nombreAlumno'] . " NO ENCONTRADO";
        $codEstado = 400;
    }
} else {
    $asignaturas = Asignatura::getAsignaturas();
    foreach ($asignaturas as $asignatura) {
        $alumnos = Alumno_Asignatura::getAlumnoBycodigo($asignatura['Codigo']);
        $devolver[$asignatura['Nombre']] = $alumnos;
    }
}
