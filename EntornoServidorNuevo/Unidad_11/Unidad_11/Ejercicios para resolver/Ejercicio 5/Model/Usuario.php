<?php
require_once 'MercadoDB.php';

class Usuario
{
    private $id;
    private $nombre;
    private $pass;
    private $rol;

    function __construct($id = 0, $nombre = "", $pass = "", $rol = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->pass = $pass;
        $this->rol = $rol;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function insert()
    {
        $conexion = MercadoDB::connectDB();
        $insercion = "INSERT INTO Usuario (Nombre, Pass, Rol) VALUES ('$this->nombre', 
        '$this->pass','$this->rol')";
        $conexion->exec($insercion);

        $conexion = null;
    }

    public function delete()
    {
        $conexion = MercadoDB::connectDB();
        $borrado = "DELETE FROM Usuario WHERE ID='$this->id'";
        $conexion->exec($borrado);
        $conexion = null;
    }
    public function update()
    {
        $conexion = MercadoDB::connectDB();
        $actualiza = "UPDATE Usuario SET Nombre='$this->nombre', Pass='$this->pass',  
        Rol='$this->rol' WHERE ID='$this->id'";
        $conexion->exec($actualiza);
        $conexion = null;
    }

    public static function getUsuarios()
    {
        $conexion = MercadoDB::connectDB();
        $seleccion = "SELECT * FROM Usuario";
        $consulta = $conexion->query($seleccion);

        $usuario = [];

        while ($registro = $consulta->fetchObject()) {
            $usuario[] = new Usuario(
                $registro->ID,
                $registro->Nombre,
                $registro->Pass,
                $registro->Rol,
            );
        }

        $conexion = null;
        return $usuario;
    }

    public static function getUsuarioByNombre($nombre)
    {
        $conexion = MercadoDB::connectDB();
        $seleccion = "SELECT * FROM Usuario WHERE Nombre='$nombre'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $Usuario = new Usuario(
                $registro->ID,
                $registro->Nombre,
                $registro->Pass,
                $registro->Rol
            );
            $conexion = null;
            return $Usuario;
        } else {
            $conexion = null;
            return false;
        }
    }


}
