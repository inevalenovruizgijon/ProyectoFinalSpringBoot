<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  if(!isset($_SESSION['colores'])){
        $_SESSION['colores']=[];
    }

  if(isset($_POST['enviar'])){
    $color=$_POST['color'];
    $_SESSION['colores'][]=$color;
    
    }else{
    $color="white";
}  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: <?php echo $color?>;">
    <form action="" method="post">
        <label for="">Introduce un color de fondo</label>
        <input type="color" name="color">
        <input type="submit" name="enviar" >
    </form>
    <br>
    <form action="paleta.php">
        <input type="submit" value="Mostrar Paleta Creada" name="paleta">
    </form>
</body>
</html>