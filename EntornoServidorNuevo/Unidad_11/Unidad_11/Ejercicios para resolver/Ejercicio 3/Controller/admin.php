<?php
  require_once "../Model/Producto.php";
    $data['productos'] = Producto::getproductos(); 
    include '../View/administrar_view.php';
?>