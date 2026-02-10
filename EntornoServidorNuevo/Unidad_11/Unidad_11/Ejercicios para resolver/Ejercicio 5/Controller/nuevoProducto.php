<?php
require_once '../Model/Producto.php'; 
move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/img/".$_FILES["imagen"]["name"]); 
$ProductoAux = new Producto("", $_POST['nombre'], $_POST['precio'], $_FILES["imagen"]["name"],$_POST['detalle'],$_POST['stock']); 
$ProductoAux->insert();  
header("Location: ../Controller/admin.php"); 
?>