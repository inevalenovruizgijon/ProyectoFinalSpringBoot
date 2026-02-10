<?php
require_once '../Model/Token.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if ($token = Token::getTokenByNombre($_REQUEST['nombre'])) {
    $tokenAux = new Token("",$_REQUEST['nombre'],$_REQUEST['pass'],$token->getPeticiones());
    $_SESSION['usuario'] = $tokenAux;
     header('Location: ../Controller/index.php'); 
    exit();
} else{
    $_SESSION['mensaje'] = "Usuario no Registrado";
    header('Location: ../Controller/login.php'); 
    exit();
}

?>