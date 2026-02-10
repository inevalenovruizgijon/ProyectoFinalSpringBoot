<?php
require_once '../Service/funciones.php';
require_once '../Model/Producto.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$devolver = [];
if (isset($_REQUEST['nombre'])) {
    $productos = Producto::getProductoByNombre($_REQUEST['nombre']);
} else if (isset($_REQUEST['min'], $_REQUEST['max'])) {
    $productos = Producto::getProductoByPrecio($_REQUEST['min'], $_REQUEST['max']);
} else {
    $productos = Producto::getproductos();
}

if (count($productos) == 0) {
    $mensaje = "PRODUCTOS NO ENCONTRADOS";
    $codEstado = 404;
} else {
    $devolver = $productos;
}



setCabecera($codEstado, $mensaje);
echo json_encode($devolver);
