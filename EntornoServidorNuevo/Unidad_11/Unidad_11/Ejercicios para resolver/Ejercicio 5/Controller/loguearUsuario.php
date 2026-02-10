<?php
require_once '../Model/Usuario.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if ($data['usuario'] = Usuario::getUsuarioByNombre($_POST['username'])) {
    if ($data['usuario']->getNombre() == $_POST['username'] && $data['usuario']->getPass() == $_POST['pass']) {
        $_SESSION['usuario']=$data['usuario'];
        if ($data['usuario']->getRol() == "admin") {
            header('Location: ../Controller/admin.php'); 
            exit();
        } else {
            header('Location: ../Controller/index.php'); 
            exit();
        }
    } else {
        $data['mensaje'] = "Error de credenciales, Usuario o contraseña incorrectas";
        include '../Controller/login.php';
    }
} else {
    $data['mensaje'] = "El Usuario no esta registrado, registrese para acceder";
    include '../Controller/login.php';
}
