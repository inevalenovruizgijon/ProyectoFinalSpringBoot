<?php
  if(isset($_POST['enviar'])){
    $color=
  }  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:<?php $color ?>;">
    <h1>Cambia de color la página</h1>

    <form action="" method="post">
        <input type="color" name="color" >
        <input type="submit" name="enviar" value="">
    </form>

    <?php
      if(isset($_POST['enviar'])){

      }  
    ?>
</body>
</html>