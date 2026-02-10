<?php
//INSERTAR ALUMNO EN ASIGNATURA
if ($alumno = Alumno::getAlumnoByNombreNormal($_REQUEST['nombre'])) {
    if ($asignatura_alumno = Alumno_Asignatura::getAlumnoBycodigoMatricula($_REQUEST['id'], $alumno->getMatricula())) {
        $mensaje = "CONFLICTO, EL ALUMNO YA ESTA EN LA ASIGNATURA";
        $codEstado = 409;
    } else {
        if ($asignatura = Asignatura::getAsignaturaBycodigo($_REQUEST['id'])) {
            $asignatura_alumno = new Alumno_Asignatura($alumno->getMatricula(), $_REQUEST['id']);
            $asignatura_alumno->insert();
            $mensaje = "ALUMNO INSERTADO CORRECTAMENTE";
            $codEstado = 200;
        } else {
            $mensaje = "CONFLICTO, ASIGNATURA NO EXISTENTE";
            $codEstado = 409;
        }
    }
}
