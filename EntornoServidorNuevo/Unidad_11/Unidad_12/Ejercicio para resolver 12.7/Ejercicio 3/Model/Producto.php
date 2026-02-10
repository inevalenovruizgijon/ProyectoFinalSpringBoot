<?php
require_once 'MercadoDB.php';

class Producto
{
    private $id;
    private $nombre;
    private $precio;
    private $imagen;
    private $detalle;
    private $stock;

    function __construct($id = 0, $nombre = "", $precio = "", $imagen = "", $detalle = "", $stock = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->detalle = $detalle;
        $this->stock = $stock;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getDetalle()
    {
        return $this->detalle;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function insert()
    {
        $conexion = MercadoDB::connectDB();
        $insercion = "INSERT INTO productos (Nombre, Precio, Imagen, Detalle, Stock) VALUES ('$this->nombre', 
        '$this->precio','$this->imagen','$this->detalle','$this->stock')";
        $conexion->exec($insercion);

        $conexion = null;
    }

    public function delete()
    {
        $conexion = MercadoDB::connectDB();
        $borrado = "DELETE FROM productos WHERE ID='$this->id'";
        $conexion->exec($borrado);
        $conexion = null;
    }
    public function update()
    {
        $conexion = MercadoDB::connectDB();
        $actualiza = "UPDATE productos SET Nombre='$this->nombre', Precio=$this->precio,  
        Imagen='$this->imagen', Detalle='$this->detalle', Stock='$this->stock' WHERE ID='$this->id'";
        $conexion->exec($actualiza);
        $conexion = null;
    }

    public static function getproductos()
    {
        $conexion = MercadoDB::connectDB();
        $seleccion = "SELECT * FROM productos";
        $consulta = $conexion->query($seleccion);
        $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
        return $productos;
    }

    public static function getProductoByNombre($cadena)
    {
        $conexion = MercadoDB::connectDB();
        $seleccion = "SELECT * FROM productos WHERE Nombre LIKE '%$cadena%'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $conexion = null;
            return $productos;
        } else {
            $conexion = null;
            return [];
        }
    }

        public static function getProductoByPrecio($min,$max)
    {
        $conexion = MercadoDB::connectDB();
        $seleccion = "SELECT * FROM productos WHERE Precio >= $min AND Precio <= $max ";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $conexion = null;
            return $productos;
        } else {
            $conexion = null;
            return [];
        }
    }
}
