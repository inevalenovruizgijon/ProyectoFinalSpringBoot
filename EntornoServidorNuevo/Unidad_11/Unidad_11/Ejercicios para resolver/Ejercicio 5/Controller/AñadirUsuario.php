<?php
require_once '../Model/Usuario.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if ($data['usuario'] = Usuario::getUsuarioByNombre($_POST['usuario'])) {
    
    $data['mensaje'] = "El Usuario ya esta registrado";
    include '../Controller/login.php';
    } else {
    $UsuarioAux = new Usuario("",$_POST['usuario'],$_POST['password'],"cliente");
    $UsuarioAux->insert();
    $_SESSION['usuario'] = Usuario::getUsuarioByNombre($_POST['usuario']);
    header('Location: ../Controller/index.php'); 
    exit();
}
