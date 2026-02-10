<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $numero=[];
      $cuadrado=[];
      $cubo=[];
      
      for ($i=0; $i <20 ; $i++) { 
        $numero[]=rand(1,100);
      }
      echo "Numero: ";
      foreach ($numero as $num) {
        echo "$num ";
      }
      for ($j=0; $j < 20; $j++) { 
        $cuadrado[]=$numero[$j]*$numero[$j];
    }
    echo "<br>Cuadrado: ";
    foreach ($cuadrado as $cuadr) {
        echo "$cuadr ";
    }
    echo "<br>Cubo: ";
    for ($i=0; $i <20 ; $i++) { 
        $cubo[]=$numero[$i]*$numero[$i]*$numero[$i];
    }
    
    foreach ($cubo as $cub) {
        echo "$cub ";
    }
    ?>
</body>
</html>