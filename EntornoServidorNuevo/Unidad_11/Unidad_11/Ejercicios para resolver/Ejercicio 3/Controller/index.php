<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['carrito'])) {

  if (!isset($_COOKIE['carrito'])) {
    $_SESSION['carrito'] = [];
    $cantTemp = [];
  } else {
    $_SESSION['carrito'] = unserialize(base64_decode($_COOKIE['carrito']));
  }
}
setcookie("carrito", base64_encode(serialize($_SESSION['carrito'])), strtotime("+1 days"));
require_once "../Model/Producto.php";
$data['productos'] = Producto::getproductos();

foreach ($data['productos'] as $producto) {
  if (isset($_SESSION['carrito'][$producto->getId()])) {
    $cantTemp [$producto->getId()] = $producto->getStock() - $_SESSION['carrito'][$producto->getId()];
  }else{
    $cantTemp [$producto->getId()] = $producto->getStock();
  }
}

include '../View/index_view.php';
unset($_SESSION['mensaje_tienda']);
