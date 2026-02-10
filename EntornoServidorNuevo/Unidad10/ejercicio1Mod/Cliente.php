<?php
  require_once 'BancoDB.php';
    class cliente {
    private $dni;
    private $nombre;
    private $direccion;
    private $telefono;

    function __construct($dni="", $nombre="", $direccion="", $telefono="") {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }
    public function getDni() {
    return $this->dni;
    }
    public function getNombre() {
    return $this->nombre;
    }
    public function getDireccion() {
    return $this->direccion;
    }
    public function getTelefono() {
    return $this->telefono;
    }
    public function insert() {
    $conexion = BancoDB::connectDB();
    $insercion = "INSERT INTO cliente (dni, Nombre, telefono,direccion) VALUES ('$this->dni','$this->nombre',
    '$this->telefono','$this->direccion')";
    $conexion->exec($insercion);
    $conexion=null;
}
public function delete() {
$conexion = BancoDB::connectDB();
$borrado = "DELETE FROM cliente WHERE dni='$this->dni'";
$conexion->exec($borrado);
$conexion=null;
}
public function update() {
$conexion = BancoDB::connectDB();
$actualiza = "UPDATE cliente SET nombre='$this->nombre', direccion='$this->direccion',
telefono='$this->telefono'
WHERE dni='$this->dni'";
$conexion->exec($actualiza);
$conexion=null;
}
public static function getclientes() {
$conexion = BancoDB::connectDB();
$seleccion = "SELECT dni, nombre, direccion, telefono FROM cliente";
$consulta = $conexion->query($seleccion);
$clientes = [];
while ($registro = $consulta->fetchObject()) {
$clientes[] = new cliente($registro->dni, $registro->nombre, $registro->direccion, $registro->telefono);
}
$conexion=null;
return $clientes;
}
    public static function getclienteBydni($dni) {
        $conexion = BancoDB::connectDB();
        $seleccion = "SELECT dni, nombre, direccion, telefono FROM cliente WHERE dni=$dni";
        $consulta = $conexion->query($seleccion);
            if ($consulta->rowCount()>0) {
                $registro = $consulta->fetchObject();
                $cliente = new cliente($registro->dni, $registro->nombre, $registro->direccion, $registro->telefono);
                $conexion=null;
                return $cliente;
            }else{
                $conexion=null;
                return false;
    }
    }
    }  
?>