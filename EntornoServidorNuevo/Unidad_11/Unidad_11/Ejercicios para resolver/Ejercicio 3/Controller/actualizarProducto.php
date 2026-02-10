<?php
  require_once '../Model/Producto.php'; 
  $data['producto']=Producto::getProductoById($_REQUEST['id']); 
  include '../View/actualizaProducto_view.php'; 
?>