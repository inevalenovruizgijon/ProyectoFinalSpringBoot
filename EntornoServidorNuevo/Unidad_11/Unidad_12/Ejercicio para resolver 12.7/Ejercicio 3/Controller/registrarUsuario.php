<?php
require_once '../Model/Token.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if ($data['token'] = Token::gettokenByNombre($_POST['nombre'])) {
    
    $data['mensaje'] = "El usuario ya esta registrado";
    include '../Controller/login.php';

    } else {
    $randomVarchar = bin2hex(random_bytes(10));
    $tokenAux = new Token("",$_REQUEST['nombre'],$randomVarchar,);
    $tokenAux->insert();
    $_SESSION['usuario'] = Token::gettokenByNombre($_POST['nombre']);
    header('Location: ../Controller/index.php'); 
    exit();
}
