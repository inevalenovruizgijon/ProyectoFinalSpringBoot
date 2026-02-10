<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $texto="Este es un texto de ejemplo para practicar el procesamiento de cadenas. Contiene varias palabras larguísimas, además de vocales repetidas y espacios en blanco. El objetivo es evaluar la capacidad de contar y reportar información básica sobre el texto.";
    $texto = trim($texto, " .");
    $arrayPalabras = explode(' ', $texto);

    $posMax = -1;
    $longMax = 0;
    $offsetBusq = 0;

    foreach ($arrayPalabras as $palabra) {
        if ($palabra === '') continue;
        $pos = strpos($texto, $palabra, $offsetBusq);
        $offsetBusq = $pos + strlen($palabra);
        if (strlen($palabra) > $longMax) {
            $longMax = strlen($palabra);
            $posMax = $pos;
        }
    }
    echo "Palabra más larga posición inicial: $posMax, longitud: $longMax"; ?><br><?php

    $contador = 0;
    foreach ($arrayPalabras as $palabra) {
        if ($palabra === '') continue;
        $long = strlen($palabra);
        $cuentaA = substr_count(strtolower($palabra), 'a');
        if ($long >= 8 && $long <= 16 && $cuentaA > 3) {
            $contador++;
        }
    }
    echo "Palabras con longitud entre 8 y 16 y más de 3 'a': $contador";
?>
</body>
</html>