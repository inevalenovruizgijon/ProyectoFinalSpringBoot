<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?=v2">
</head>
<body>
    <?php
    $precio1=$_POST['precio1'];
    $precio2=$_POST['precio2'];
    $precio3=$_POST['precio3'];
    $precioMedio=($precio1+$precio2+$precio3)/3;
    
     
    ?>

    <table>
        <tr>
            <th colspan="3">Precio medio: <?=$precioMedio?></th>
        </tr>

        <tr>
            <th colspan="3">Precios de las tiendas</th>
        </tr>

        <tr>
            <td>Tienda 1 <br></td>
            <td>Precio:<?= $precio1?></td>
            <td>Diferencia con la media:<?= $precio1-$precioMedio?></td>
        </tr>

        <tr>
            <td>Tienda 1</td>
            <td>Precio:<?= $precio2?></td>
            <td>Diferencia con la media:<?=$precio2-$precioMedio?></td>
        </tr>

        <tr>
            <td>Tienda 3</td>
            <td>Precio:<?= $precio3?></td>
            <td>Diferencia con la media:<?= $precio3-$precioMedio?></td>
        </tr>
    </table>


    </body>
</html>