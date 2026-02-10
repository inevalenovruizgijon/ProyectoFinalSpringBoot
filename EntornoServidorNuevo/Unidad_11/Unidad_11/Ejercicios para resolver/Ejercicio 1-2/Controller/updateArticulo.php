<?php
    require_once '../Model/Articulo.php'; 
 
  $articulo=Articulo::getArticuloById($_REQUEST['id']); 
  $ArticuloAux = new Articulo($_REQUEST['id'], $_POST['titulo'], "", $_POST['contenido']); 
  $ArticuloAux->update(); 
  header("Location: ../Controller/index.php");   
?>