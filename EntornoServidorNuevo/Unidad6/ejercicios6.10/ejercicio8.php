<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <?php

// Pedir la fecha de nacimiento y el nombre de dos personas y mostrar la edad de cada una, así
// como el nombre de la persona mayor
      if(isset($_GET['enviar'])){
        $fecha1=$_GET['fecha1'];
        $fecha2=$_GET['fecha2'];
        $nombre1=$_GET['nombre1'];
        $nombre2=$_GET['nombre2'];
        
        $fechaNac1=strtotime($fecha1);
        $fechaNac2=strtotime($fecha2);
        $hoy=time();
        $final1=$hoy-$fechaNac1;
        $final2=$hoy-$fechaNac2;
        $anio=60*60*24*365.25;
            echo "La edad de $nombre1 es: "  . floor($final1/$anio) ." años"; ?><br><?php
            echo "La edad de $nombre2 es: "  . floor($final2/$anio) ." años";?><br><?php
            if($final1>$final2){
                echo "El mayor es $nombre1";
            }else{
                echo "El mayor es $nombre2";

            }
      }else{
    ?>

    <form action="#" method="get">
        <label for="">Introduce nombre</label>
        <input type="text" name="nombre1"><br>
        <label for="">Introduce una fecha de nacimiento</label><br>
        <input type="date" name="fecha1"><br>
        <label for="">Introduce nombre</label>
        <input type="text" name="nombre2"><br> 
        <label for="">Introduce una fecha de nacimiento</label><br>
        <input type="date" name="fecha2"><br> 
        </select>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
      }  
    ?>
</body>
</html>