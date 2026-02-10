<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  if(!isset($_SESSION['numero'])){
        $_SESSION['numero']=0;
  }else{
    header("Location:sesionIniciada.php");
  }  
  if(isset($_GET['enviar'])){
    $_SESSION['numero']=$_GET['numero'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <label for="">Introduce un numero</label>
        <input type="text" name="numero">
        <input type="submit" name="enviar">
    </form>
</body>
</html>