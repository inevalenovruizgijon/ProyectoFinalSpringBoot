<?php
require_once '../Model/Producto.php'; 

  $producto=Producto::getProductoById($_REQUEST['id']); 
  $imagen=$_REQUEST['imagenVieja']; 
  if ($_FILES["imagen"]["name"]!="") {
    unlink("../View/img/$imagen"); 
    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/img/".$_FILES["imagen"]["name"]); 
    $imagen=$_FILES["imagen"]["name"]; 
  } 
 
  $productoAux = new Producto($_REQUEST['id'], $_POST['nombre'],$_POST['precio'], $imagen, $_POST['detalle'],$_POST['stock']); 
  $productoAux->update(); 
  header("Location: ../Controller/admin.php");  
?>