<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $diametro=$_POST['diametro'];
        $altura=$_POST['altura'];
        $caudal=$_POST['caudal'];
        $radio=$diametro/2;

        $volumen = pi() * pow($radio, 2) * $altura * 1000;
        $tiempo_minutos = $volumen / $caudal;
        $horas = floor($tiempo_minutos / 60);
        $minutos = round($tiempo_minutos % 60);
        echo "<h2>El tiempo que tardará será aproximadamente $horas horas y $minutos minutos </h2>"
    ?>

    

</body>
</html>