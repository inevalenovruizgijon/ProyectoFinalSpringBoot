<?php
require_once 'MercadoDB.php';
require_once 'Producto.php';

class Cesta
{
    private $cod_Producto;
    private $id_cliente;
    private $cantidad;

    function __construct( $id_cliente = 0,$cod_Producto = 0, $cantidad = 1)
    {
        $this->cod_Producto = $cod_Producto;
        $this->id_cliente = $id_cliente;
        $this->cantidad = $cantidad;
    }

    public function getCod_Producto()
    {
        return $this->cod_Producto;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function insert()
    {
        $conexion = MercadoDB::connectDB();
        $insercion = "INSERT INTO Cesta (ID_cliente, Cod_Producto, Cantidad) 
        VALUES ('$this->id_cliente','$this->cod_Producto','$this->cantidad')";
        $conexion->exec($insercion);

        $conexion = null;
    }

    public function delete()
    {
        $conexion = MercadoDB::connectDB();
        $borrado = "DELETE FROM Cesta WHERE Cod_Producto='$this->cod_Producto' AND ID_cliente='$this->id_cliente'";
        $conexion->exec($borrado);
        $conexion = null;
    }

    public function update()
    {
        $conexion = MercadoDB::connectDB();
        $actualiza = "UPDATE Cesta SET Cantidad='$this->cantidad' WHERE Cod_Producto='$this->cod_Producto'  AND ID_cliente='$this->id_cliente'";
        $conexion->exec($actualiza);
        $conexion = null;
    }

    public static function getCesta()
    {
        $conexion = MercadoDB::connectDB();
        $seleccion = "SELECT * FROM Cesta";
        $consulta = $conexion->query($seleccion);

        $cesta = [];

        while ($registro = $consulta->fetchObject()) {
            $cesta[] = new Cesta(
                $registro->Cod_Producto,
                $registro->ID_cliente,
                $registro->Cantidad
            );
        }

        $conexion = null;
        return $cesta;
    }

    public static function getProductoByIdCliente($id_cliente)
    {
        $conexion = MercadoDB::connectDB();
        $seleccion = "SELECT p.ID, p.Nombre, p.Imagen, p.Detalle, p.Precio, p.Stock 
        FROM productos As p
        INNER JOIN Cesta AS c ON c.Cod_Producto = p.ID
        WHERE ID_cliente='$id_cliente'";

        $consulta = $conexion->query($seleccion);
        $productos = [];

        while ($registro = $consulta->fetchObject()) {
            $productos[] = new Producto(
                $registro->ID,
                $registro->Nombre,
                $registro->Precio,
                $registro->Imagen,
                $registro->Detalle,
                $registro->Stock
            );
        }

        $conexion = null;
        return $productos;

    }

        public static function getProductoByIdClienteCodigo($id_cliente,$cod_producto)
    {
        $conexion = MercadoDB::connectDB();
        $seleccion = "SELECT * FROM Cesta WHERE ID_cliente='$id_cliente' AND Cod_Producto='$cod_producto'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $cesta = new Cesta(
                $registro->ID_cliente,
                $registro->Cod_Producto,
                $registro->Cantidad
            );
            $conexion = null;
            return $cesta;
        } else {
            $conexion = null;
            return false;
        }
    }


}
