<?php
require_once "../Model/Usuario.php";
require_once "../Model/Producto.php";
require_once "../Model/Cesta.php";
if (session_status() == PHP_SESSION_NONE) session_start();

if ($_SESSION['usuario']->getRol()== "admin") {
  header('Location: ../Controller/admin.php'); 
  exit();
}

$data['productos'] = Producto::getproductos();
foreach ($data['productos'] as $producto) {
  if ($cesta = Cesta::getProductoByIdClienteCodigo($_SESSION['usuario']->getId(),$producto->getId())) {
    $cantTemp [$producto->getId()] = $producto->getStock() - $cesta->getCantidad();
  }else{
    $cantTemp [$producto->getId()] = $producto->getStock();
  }
}

include '../View/index_view.php';
unset($_SESSION['mensaje_tienda']);
