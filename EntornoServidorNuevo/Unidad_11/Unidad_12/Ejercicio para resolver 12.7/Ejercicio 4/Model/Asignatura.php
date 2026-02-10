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

    public function getCodigo()
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
        $asignaturas = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
        return $asignaturas;
    }

    public static function getAsignaturaBycodigo($codigo)
    {
        $conexion = EscuelaDB::connectDB();
        $seleccion = "SELECT * FROM Asignatura WHERE codigo=$codigo";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $asignaturas = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $conexion = null;
            return $asignaturas;
        } else {
            $conexion = null;
            return false;
        }
    }


}
