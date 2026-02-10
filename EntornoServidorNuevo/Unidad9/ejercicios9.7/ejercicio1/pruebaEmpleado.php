<?php
  include "Empleado.php";
  $empleado1=new Empleado("Juan",4000);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $empleado1->asigna("Juan",3200);
      $empleado1->pagarImpuestos();  
    ?>
    
</body>
</html>