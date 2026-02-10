<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      if(isset($_GET['enviar'])){
        $hora=$_GET['hora'];
        $min=$_GET['min'];
        $seg=$_GET['seg'];
        $formato=$_GET['formato'];
        
        $horaFinal=strtotime("$hora:$min:$seg");
        if($hora<0 || $hora>=24 || $min<0 || $min>60 || $seg<0 || $seg>60){
            echo "Fecha invalida";
        }else{
            echo 'La hora es: ' .$a=date($formato,$horaFinal);?><br><?php

        }
      }else{
    ?>

    <form action="#" method="get">
        <label for="">Hora</label>
        <input type="text" name="hora"><br>
        <label for="">Introduce minutos</label><br>
        <input type="text" name="min"><br>
        <label for="">Introduce segundos</label><br>
        <input type="text" name="seg">
        <select name="formato">
            <option value="H:i:s">"H:i:s"</option>
            <option value="G:i:s">"G:i:s"</option>
            <option value="g:i:s">"g/i/s"</option>
        </select>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
      }  
    ?>
</body>
</html>