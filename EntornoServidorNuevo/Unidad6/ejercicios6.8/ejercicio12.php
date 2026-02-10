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

    $countMas10 = 0;
    $vocales = ['a'=>0,'e'=>0,'i'=>0,'o'=>0,'u'=>0];
    $totalEspacios = substr_count($texto, ' ');
    $totalCaracteres = strlen($texto);

    foreach ($arrayPalabras as $palabra) {
        if ($palabra == '') continue;
        if (strlen($palabra) > 10) $countMas10++;
        $letras = str_split(strtolower($palabra));
        foreach ($letras as $letra) {
            if (isset($vocales[$letra])) $vocales[$letra]++;
        }
    }

    echo "Palabras con más de 10 letras: $countMas10";?><br><?php
    foreach ($vocales as $v => $c) {
        echo "Vocal $v: $c";?><br><?php
    }
    $porcentajeEspacios = ($totalEspacios / $totalCaracteres)*100;
    echo "Porcentaje espacios: " . number_format($porcentajeEspacios, 2);?><br><?php
  
    ?>
</body>
</html>