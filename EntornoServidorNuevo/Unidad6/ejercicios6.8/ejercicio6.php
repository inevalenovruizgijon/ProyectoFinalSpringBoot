<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $parrafo="hola hola hola hola . hola hola";
    $frases = explode('.', $parrafo);
    $contadorFrases = 1;
    foreach ($frases as $frase) {
        $frase = trim($frase);
        if ($frase === '') continue;
        $arrayPalabras = explode(' ', $frase);
        $contador = 0;
        foreach ($arrayPalabras as $palabra) {
            if ($palabra !== '') $contador++;
        }
        echo "Frase $contadorFrases tiene $contador palabras\n";
        $contadorFrases++;
    }
    ?>
</body>
</html>