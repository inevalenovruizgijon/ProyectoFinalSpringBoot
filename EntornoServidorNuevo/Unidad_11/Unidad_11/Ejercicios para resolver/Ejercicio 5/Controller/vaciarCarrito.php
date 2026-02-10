<?php
require_once '../Model/Producto.php';
require_once '../Model/Cesta.php';
require_once '../Model/Usuario.php';
if (session_status() == PHP_SESSION_NONE) session_start();

$data['cesta'] =  Cesta::getProductoByIdCliente($_SESSION['usuario']->getId());

foreach ($data['cesta'] as $producto) {
    $cesta = Cesta::getProductoByIdClienteCodigo($_SESSION['usuario']->getId(), $producto->getId());
    $producto->update();
    $cesta->delete();
}

header('Location: ../Controller/index.php');
exit();
