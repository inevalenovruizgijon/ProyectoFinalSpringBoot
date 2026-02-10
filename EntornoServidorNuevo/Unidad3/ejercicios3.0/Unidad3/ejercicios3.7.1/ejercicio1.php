<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <?php
        $altura=$_GET['altura'];
        $diametro=$_GET['diametro'];
        $radio=$diametro/2;
        $suma=pi()*($radio*$radio)*$altura;

        echo "<h1>Calculo de volúmen de cilindro</h1>";
        echo "<h3>El volumen del cilindro es $suma</h3>";
    ?>
    
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Zylinder-senkr-kreis-hr-s.svg/150px-Zylinder-senkr-kreis-hr-s.svg.png" alt="">
    
</body>
</html>