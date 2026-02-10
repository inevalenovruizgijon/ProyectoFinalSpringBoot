<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    img {
    width: 40px;
    height: 40px;
    cursor: pointer;
}
</style>


</head>
<body>
    <?php

$ojoCerrado = '/EntornoServidor/Unidad3/ejercicios4.6/4.6.5/istockphoto-1369045302-612x612.jpg';
$ojoAbierto = '/EntornoServidor/Unidad3/ejercicios4.6/4.6.5/lagoftalmos.jpg';

$filaAbierta = isset($_GET['fila']) ? $_GET['fila'] : -1;
$colAbierta = isset($_GET['col']) ? $_GET['col'] : -1;

echo '<table border="1">';
for ($fila = 0; $fila < 10; $fila++) {
    echo '<tr>';
    for ($col = 0; $col < 10; $col++) {
        echo '<td>';

        $img = ($fila == $filaAbierta && $col == $colAbierta) ? $ojoAbierto : $ojoCerrado;

        echo "<a href='?fila=$fila&col=$col'><img src='$img' alt='ojo'></a>";
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>


</body>
</html>