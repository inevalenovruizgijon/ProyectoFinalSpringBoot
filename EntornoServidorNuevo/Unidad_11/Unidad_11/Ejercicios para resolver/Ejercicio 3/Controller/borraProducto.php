<?php
require_once '../Model/Producto.php'; 
$articuloAux = new Producto($_GET['id']); 
$articuloAux->delete();  
header("Location: ../Controller/index.php");  
?>