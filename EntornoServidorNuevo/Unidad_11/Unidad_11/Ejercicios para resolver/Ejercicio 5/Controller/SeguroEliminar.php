<?php
require_once '../Model/Producto.php';
$data['producto'] = Producto::getProductoById($_GET['id']);
include '../View/SeguroEliminar.php';