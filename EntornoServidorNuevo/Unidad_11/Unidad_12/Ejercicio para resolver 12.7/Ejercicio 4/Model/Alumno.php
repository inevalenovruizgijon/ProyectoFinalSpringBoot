<?php
require_once 'EscuelaDB.php';

class Alumno
{
    private $matricula;
    private $nombre;
    private $apellido;
    private $curso;

    function __construct($matricula = "", $nombre = "", $apellido = "", $curso = "")
    {
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->curso = $curso;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCurso()
    {
        return $this->curso;
    }

    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM Alumno WHERE Matricula='$this->matricula'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() == 0) {
            $insercion = "INSERT INTO Alumno (Matricula, Nombre, Apellido, Curso) VALUES ('$this->matricula','$this->nombre','$this->apellido','$this->curso')";
            $conexion->exec($insercion);
            $conexion = null;
            return true;
        } else {
            $conexion = null;
            return false;
        }
    }

    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM Alumno WHERE Matricula='$this->matricula'";
        $conexion->exec($borrado);
        $conexion = null;
    }
    public function update()
    {
        $conexion = EscuelaDB::connectDB();
        $actualiza = "UPDATE Alumno SET Nombre='$this->nombre', Apellido='$this->apellido', Curso='$this->curso' 
        WHERE Matricula='$this->matricula'";
        $conexion->exec($actualiza);
        $conexion = null;
    }

    public static function getAlumnos()
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM Alumno";
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

        $conexion = null;
        return $alumnos;
    }

    public static function getAlumnoById($matricula)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM Alumno WHERE Matricula='$matricula'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $alumno = new Alumno(
                $registro->Matricula,
                $registro->Nombre,
                $registro->Apellido,
                $registro->Curso
            );
            $conexion = null;
            return $alumno;
        } else {
            $conexion = null;
            return [];
        }
    }

    public static function getAlumnoByGrupo($curso)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM Alumno WHERE Curso='$curso'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $alumnos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $alumnos;
        } else {
            $conexion = null;
            return [];
        }
    }

        public static function getAlumnoByNombre($nombre)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM Alumno WHERE Nombre LIKE '%$nombre%'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $alumnos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $alumnos;
        } else {
            $conexion = null;
            return [];
        }
    }

        public static function getAlumnoByNombreNormal($nombre)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM Alumno WHERE Nombre='$nombre'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $alumno = new Alumno(
                $registro->Matricula,
                $registro->Nombre,
                $registro->Apellido,
                $registro->Curso
            );
            $conexion = null;
            return $alumno;
        } else {
            $conexion = null;
            return [];
        }
    }



}
