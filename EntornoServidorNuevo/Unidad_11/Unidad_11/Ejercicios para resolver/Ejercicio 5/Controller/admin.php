<?php
require_once "../Model/Usuario.php";
require_once "../Model/Producto.php";
if (session_status() == PHP_SESSION_NONE) session_start();

if ($_SESSION['usuario']->getRol() == "cliente") {
  header('Location: ../Controller/index.php');
  exit();
} else {
  $data['productos'] = Producto::getproductos();
  include '../View/administrar_view.php';
}
