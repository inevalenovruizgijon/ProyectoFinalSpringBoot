<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php'; 
    unset($_SESSION['carrito']);
    setcookie("carrito", "", strtotime(-1));
    header('Location: ../Controller/index.php');
    exit();
?>