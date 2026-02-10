<?php
require_once "../Model/Producto.php";
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';
if (session_status() == PHP_SESSION_NONE) session_start();

$data['cesta'] = Cesta::getProductoByIdClienteCodigo($_SESSION['usuario']->getId(), $_GET['cod_producto']);

if ($data['cesta']->getCantidad()>1) {
    $cestaAux = new Cesta($_SESSION['usuario']->getId(), $_GET['cod_producto'], $data['cesta']->getCantidad() - 1);
    $cestaAux->update();
}else{
    $data['cesta']->delete();
}


header('Location: ../Controller/carrito.php');
exit();
