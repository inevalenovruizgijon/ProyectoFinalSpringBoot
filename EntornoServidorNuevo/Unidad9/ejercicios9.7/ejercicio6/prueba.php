<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "Vehiculo.php";
        $vehiculosCreados = 0;
        $kmTotales = 0;

        $bici = new Bicicleta();
        $vehiculosCreados++;
        $coche = new Coche();
        $vehiculosCreados++;

        $bici->recorre(10, $kmTotales);
        $coche->recorre(50, $kmTotales);

        echo "Vehículos creados: " . $vehiculosCreados . "<br>";
        echo "Km totales: " . $kmTotales . "<br>";

        $bici->getKmRecorridos();
        $coche->getKmRecorridos();

        $bici->hacerCaballito();
        $coche->quemarRueda();  
    ?>
</body>
</html>