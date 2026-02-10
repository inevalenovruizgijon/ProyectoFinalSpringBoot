<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
$data['producto'] = Producto::getProductoById($_REQUEST['id']);
if (count($data) > 0) {

    if (!isset($_SESSION['carrito'][$data['producto']->getId()])) {
        $_SESSION['carrito'][$data['producto']->getId()]=1;
    } else {
        $_SESSION['carrito'][$data['producto']->getId()]++;
    }
}
header('location:'.getenv('HTTP_REFERER'));
exit();
