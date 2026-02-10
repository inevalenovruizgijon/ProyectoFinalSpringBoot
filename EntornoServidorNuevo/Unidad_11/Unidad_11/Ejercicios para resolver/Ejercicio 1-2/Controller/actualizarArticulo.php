<?php
  require_once '../Model/Articulo.php'; 
  $data['articulo']=Articulo::getArticuloById($_REQUEST['id']); 
  include '../View/actualizaArticulo_view.php'; 
?>