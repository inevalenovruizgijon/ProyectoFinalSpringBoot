<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once "../Model/Producto.php";
foreach ($_SESSION['carrito'] as $key => $value) {
  $data['productos'][] = [Producto::getProductoById($key),$value];
}
include '../View/carrito_view.php';