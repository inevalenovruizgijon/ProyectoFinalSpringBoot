<?php
require_once '../Service/funciones.php';
require_once '../Model/Token.php';
if (session_status() == PHP_SESSION_NONE) session_start();
$url = "http://localhost/Entorno_Servidor/Unidad_12/Ejercicio%20para%20resolver%2012.7/Ejercicio%203/Service/service.php";
$token = Token::getTokenByNombre($_SESSION['usuario']->getNombre());
?>
<style>
    body { font-family: 'Inter', sans-serif; background-color: #f0f2f5; padding: 20px; display: flex; flex-direction: column; align-items: center; }
    .table-container { width: 90%; max-width: 800px; margin-top: 20px; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); background: white; }
    .tabla-productos { width: 100%; border-collapse: collapse; }
    .tabla-productos thead { background-color: #00703c; color: white; }
    .tabla-productos th, .tabla-productos td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
    .fila-datos:hover { background-color: #f1f8f4; }
    .btn-volver { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #f07d00; color: white; text-decoration: none; border-radius: 8px; font-weight: bold; }
</style>
<?php

if ($_SESSION['usuario']->getToken() == $token->getToken()) {

    if (isset($_REQUEST['FiltrarPorNombre'])) {
        $parametros = '?nombre=' . $_REQUEST['nombre'];
        mostrarDatos($url, $parametros);
    } else if (isset($_REQUEST['FiltrarPorPrecio'])) {
        $parametros = '?min=' . $_REQUEST['min'] . '&max=' . $_REQUEST['max'];
        mostrarDatos($url, $parametros);
    }

    $tokenAux = new Token("", $token->getNombre(),$token->getToken(),$token->getPeticiones()); 
  $tokenAux->update(); 

}else{
    $_SESSION['mensaje']="Error Su token no es valido";
    header('Location: ../Controller/index.php'); 
    exit();
}
