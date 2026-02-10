<?php
$datos = @file_get_contents("https://api.openweathermap.org/data/2.5/forecast?q=" . $_REQUEST['ciudad'] . ",ES&units=metric&lang=es&appid=525bda8aa076ccc8a38277509d5bed1a");
$tiempo = json_decode($datos);

$pronosticoPorDia = [];

if ($http_response_header[0] == "HTTP/1.1 200 OK") {

    foreach ($tiempo->list as $item) {
        $nombreIngles = date('D', $item->dt);
        if (!isset($pronosticoPorDia[$nombreIngles])) {
            $pronosticoPorDia[$nombreIngles]=$item;
        }
    }

}

$diasSemanas = [
    'Sun' => 'dom', 'Mon' => 'lun', 'Tue' => 'mar', 
    'Wed' => 'mié', 'Thu' => 'jue', 'Fri' => 'vie', 'Sat' => 'sáb'
];

include "index.php";
