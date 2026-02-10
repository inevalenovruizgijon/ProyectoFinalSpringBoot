<?php
$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$devolver = [];
$cartas_elegidas = [];

if (isset($_REQUEST['cantidad'])) {
    if ($_REQUEST['cantidad'] > 40 || $_REQUEST['cantidad'] < 0) {
        $codEstado = 400;
        $mensaje = "SOLICITUD INCORRECTA NUMERO DE CARTAS MENOR QUE 0 O MAYOR QUE 40";
    } else {

        $cartas = [1, 2, 3, 4, 5, 6, 7, "sota", "caballo", "rey"];
        $palo = ["oro", "copa", "espada", "basto"];

        while (count($cartas_elegidas) < $_REQUEST['cantidad']) {

            $random_palo =  $palo[rand(0, 3)];
            $random_num = $cartas[rand(0, 9)];

            $clave = $random_palo . $random_num;

            if (!array_key_exists($clave, $cartas_elegidas)) {
                $cartas_elegidas[$clave] = $random_num . " de " . $random_palo;
                $devolver[] = ["numero" => $random_num, "palo" => $random_palo];
            }
        }
    }
} else {
    $codEstado = 400;
    $mensaje = "FALTA DE PARAMETROS";
}

function setCabecera($codEstado, $mensaje)
{
    header("HTTP/1.1 $codEstado $mensaje");
    header("Content-Type: application/json;charset=utf-8");
}

setCabecera($codEstado, $mensaje);
if ($codEstado == 200) {
    echo json_encode($devolver);
}
