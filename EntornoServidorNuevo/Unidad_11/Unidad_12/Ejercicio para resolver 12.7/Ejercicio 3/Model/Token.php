<?php
require_once 'MercadoDB.php';

class Token
{
    private $id;
    private $nombre;
    private $token;
    private $peticiones;

    function __construct($id = 0, $nombre = "", $token = "", $peticiones = 1)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->token = $token;
        $this->peticiones = $peticiones;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getPeticiones()
    {
        return $this->peticiones;
    }

    public function insert()
    {
        $conexion = MercadoDB::connectDB();
        $insercion = "INSERT INTO Token (Nombre, token, Peticiones) VALUES ('$this->nombre', 
        '$this->token','$this->peticiones')";
        $conexion->exec($insercion);

        $conexion = null;
    }

    public function update()
    {
        $conexion = MercadoDB::connectDB();
        $actualiza = "UPDATE Token SET Peticiones = $this->peticiones + 1";
        $conexion->exec($actualiza);
        $conexion = null;
    }

    public static function getTokenByNombre($nombre)
    {
        $conexion = MercadoDB::connectDB();
        $seleccion = "SELECT * FROM Token WHERE Nombre='$nombre'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $Token = new Token(
                $registro->ID,
                $registro->Nombre,
                $registro->Token,
                $registro->Peticiones
            );
            $conexion = null;
            return $Token;
        } else {
            $conexion = null;
            return false;
        }
    }

}
