<?php
$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$total = 0;
$devolver = [];
$moneda=$_REQUEST['conversion']??"sin moneda";
if (isset($_REQUEST['conversion'], $_REQUEST['cantidad'])) {

    // SI LA CANTIDAD ES POSITIVA SE REALIZA PETICION
    if ($_REQUEST['cantidad'] > 0) {
        // PESETAS
        if ($moneda == "pesetas") {
            $total = $_REQUEST['cantidad'] / 166.386;
        // EUROS
        } else if ($moneda == "euros") {
            $total = $_REQUEST['cantidad'] * 166.386;
        }

        $devolver = ['total' => $total, 'moneda' => $moneda];

    } else {
        $codEstado = 400;
        $mensaje = "NO PUEDES INGRESAR UNA CANTIDAD NEGATIVA";
    }
} else {
    $devolver = ['total' => $total, 'moneda' => $moneda];
}


setCabecera($codEstado, $mensaje);
if ($codEstado == 200) {
    echo json_encode($devolver);
}

// FUNCION PARA ACTUALIZAR LA CABEZERA
function setCabecera($codEstado, $mensaje) {   
  header("HTTP/1.1 $codEstado $mensaje");   
  header("Content-Type: application/json;charset=utf-8");   
}
