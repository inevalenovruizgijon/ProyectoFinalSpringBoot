<?php
require_once 'EscuelaDB.php';

class Asignatura
{
    private $codigo;
    private $nombre;

    function __construct($codigo = 0, $nombre = "")
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
    }

    public function getcodigo()
    {
        return $this->codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function insert()
    {
        $conexion = EscuelaDB::connectDB();
        $insercion = "INSERT INTO Asignatura (Nombre) VALUES ('$this->nombre')";
        $conexion->exec($insercion);
        $conexion = null;
    }

    public function delete()
    {
        $conexion = EscuelaDB::connectDB();
        $borrado = "DELETE FROM Asignatura WHERE Codigo='$this->codigo'";
        $conexion->exec($borrado);
        $conexion = null;
    }
    public function update()
    {
        $conexion = EscuelaDB::connectDB();
        $actualiza = "UPDATE Asignatura SET  Nombre=$this->nombre";
        $conexion->exec($actualiza);
        $conexion = null;
    }

    public static function getAsignaturas()
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM Asignatura";
        $consulta = $conexion->query($seleccion);

        $Asignaturas = [];

        while ($registro = $consulta->fetchObject()) {
            $Asignaturas[] = new Asignatura(
                $registro->Codigo,
                $registro->Nombre
            );
        }

        $conexion = null;
        return $Asignaturas;
    }

    public static function getAsignaturaBycodigo($codigo)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM Asignatura WHERE codigo=$codigo";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $Asignatura = new Asignatura(
                $registro->Codigo,
                $registro->Nombre
            );
            $conexion = null;
            return $Asignatura;
        } else {
            $conexion = null;
            return false;
        }
    }


}
