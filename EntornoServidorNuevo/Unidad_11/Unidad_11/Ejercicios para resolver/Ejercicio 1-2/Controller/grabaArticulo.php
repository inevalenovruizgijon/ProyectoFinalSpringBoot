<?php
require_once '../Model/Articulo.php'; 
$ArticuloAux = new Articulo("", $_POST['titulo'], "", 
$_POST['contenido']); 
$ArticuloAux->insert();  
header("Location: ../Controller/index.php"); 
?>