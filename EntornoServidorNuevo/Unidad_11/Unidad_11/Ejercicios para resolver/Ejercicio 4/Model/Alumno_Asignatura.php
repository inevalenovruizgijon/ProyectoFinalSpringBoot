<?php
require_once 'EscuelaDB.php';
require_once 'Alumno.php';
require_once 'Asignatura.php';

class Alumno_Asignatura
{
    private $matricula;
    private $codigo;

    function __construct($matricula = "", $codigo = "")
    {
        $this->matricula = $matricula;
        $this->codigo = $codigo;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM Alumno_Asignatura WHERE Matricula='$this->matricula' AND Codigo='$this->codigo'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() == 0) {
            $insercion = "INSERT INTO Alumno_Asignatura (Matricula, Codigo) VALUES ('$this->matricula','$this->codigo')";
            $conexion->exec($insercion);
            $conexion = null;
        } else {
            $conexion = null;
            return false;
        }
    }

    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM Alumno_Asignatura WHERE Matricula='$this->matricula' AND Codigo='$this->codigo'";
        $conexion->exec($borrado);
        $conexion = null;
    }

    public static function getAsignaturaBymatricula($matricula)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT asig.Nombre, asig.Codigo
              FROM Asignatura AS asig
              INNER JOIN Alumno_Asignatura AS aa ON asig.Codigo = aa.Codigo
              WHERE aa.Matricula = $matricula";
        $consulta = $conexion->query($seleccion);
        $asignaturas = [];
        while ($registro = $consulta->fetchObject()) {
            $asignaturas[] = new Asignatura(
                $registro->Codigo,
                $registro->Nombre,
            );
        }
        return $asignaturas;
    }

    public static function getAlumnoBycodigo($codigo)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT a.Nombre, a.Apellido, a.Curso, a.Matricula
              FROM Alumno AS a
              INNER JOIN Alumno_Asignatura AS aa ON a.Matricula = aa.Matricula
              WHERE aa.Codigo = $codigo";
        $consulta = $conexion->query($seleccion);
        $alumnos = [];
        while ($registro = $consulta->fetchObject()) {
            $alumnos[] = new Alumno(
                $registro->Matricula,
                $registro->Nombre,
                $registro->Apellido,
                $registro->Curso
            );
        }
        return $alumnos;
    }
}
