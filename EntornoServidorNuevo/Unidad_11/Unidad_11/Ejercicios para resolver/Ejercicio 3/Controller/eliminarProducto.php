<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  require_once "../Model/Producto.php";

    $data['producto'] = Producto::getProductoById($_REQUEST['id']);
    if ($_SESSION['carrito'][$data['producto']->getId()] > 1) {
        $_SESSION['carrito'][$data['producto']->getId()]--;

    } else {
        unset($_SESSION['carrito'][$data['producto']->getId()]);
    }
    header('Location: ../Controller/carrito.php'); 
    exit();

?>