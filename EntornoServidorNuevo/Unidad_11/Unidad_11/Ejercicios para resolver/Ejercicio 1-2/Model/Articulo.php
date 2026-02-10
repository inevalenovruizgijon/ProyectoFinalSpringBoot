<?php
require_once 'BlogsDB.php';

class Articulo
{
    private $id;
    private $titulo;
    private $fecha_pub;
    private $contenido;

    function __construct($id = 0, $titulo = "", $fecha_pub = "", $contenido = "")
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->fecha_pub = $fecha_pub;
        $this->contenido = $contenido;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getFecha_pub()
    {
        return $this->fecha_pub;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function insert()
    {
        $conexion = BlogsDB::connectDB();
        $insercion = "INSERT INTO articulos (Titulo, Fecha_pub, Contenido) VALUES ('$this->titulo', 
        NOW(),'$this->contenido')";
        $conexion->exec($insercion);

        $conexion = null;
    }

    public function delete()
    {
        $conexion = BlogsDB::connectDB();
        $borrado = "DELETE FROM articulos WHERE ID='$this->id'";
        $conexion->exec($borrado);
        $conexion = null;
    }
    public function update()
    {
        $conexion = BlogsDB::connectDB();
        $actualiza = "UPDATE articulos SET Titulo='$this->titulo', Fecha_pub=NOW(),  
        Contenido='$this->contenido'  
        WHERE ID='$this->id'";
        $conexion->exec($actualiza);
        $conexion = null;
    }

    public static function getArticulos()
    {
        $conexion = BlogsDB::connectDB();
        $seleccion = "SELECT ID, Titulo, Fecha_pub, Contenido FROM articulos";
        $consulta = $conexion->query($seleccion);

        $articulos = [];

        while ($registro = $consulta->fetchObject()) {
            $articulos[] = new Articulo(
                $registro->ID,
                $registro->Titulo,
                $registro->Fecha_pub,
                $registro->Contenido
            );
        }

        $conexion = null;
        return $articulos;
    }

    public static function getArticuloById($id)
    {
        $conexion = BlogsDB::connectDB();
        $seleccion = "SELECT ID, Titulo, Fecha_pub, Contenido FROM articulos WHERE ID=$id";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $articulo = new Articulo(
                $registro->ID,
                $registro->Titulo,
                $registro->Fecha_pub,
                $registro->Contenido
            );
            $conexion = null;
            return $articulo;
        } else {
            $conexion = null;
            return false;
        }
    }
}
