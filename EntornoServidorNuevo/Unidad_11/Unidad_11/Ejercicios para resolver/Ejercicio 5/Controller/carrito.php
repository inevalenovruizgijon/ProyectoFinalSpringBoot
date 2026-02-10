<?php
require_once "../Model/Usuario.php";
require_once "../Model/Cesta.php";
if (session_status() == PHP_SESSION_NONE) session_start();
if ($_SESSION['usuario']->getRol() == "admin") {
  header('Location: ../Controller/admin.php');
  exit();
} else {
$productos = Cesta::getProductoByIdCliente($_SESSION['usuario']->getId());

foreach ($productos as $producto) {
  $cesta = Cesta::getProductoByIdClienteCodigo($_SESSION['usuario']->getId(),$producto->getId());
  $data['productos'][] = [$producto,$cesta->getCantidad()];
}

  include '../View/carrito_view.php';
}
