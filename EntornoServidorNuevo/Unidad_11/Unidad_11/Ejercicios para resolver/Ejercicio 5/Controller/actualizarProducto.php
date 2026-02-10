<?php
  require_once '../Model/Producto.php'; 
  require_once '../Model/Usuario.php'; 
if (session_status() == PHP_SESSION_NONE) session_start();
if ($_SESSION['usuario']->getRol() == "cliente") {
  header('Location: ../Controller/index.php');
  exit();
} else{
  $data['producto']=Producto::getProductoById($_REQUEST['id']); 
  include '../View/actualizaProducto_view.php'; 
}
