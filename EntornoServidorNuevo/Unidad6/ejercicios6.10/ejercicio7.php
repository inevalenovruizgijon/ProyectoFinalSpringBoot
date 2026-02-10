<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <?php

//        Pedir al usuario su fecha de naºcimiento y una fecha futura, y mostrar la edad que tendrá en esa
// fecha (un año tiene 60*60*24*365.25 segundos)
      if(isset($_GET['enviar'])){
        $fechaNacimiento=$_GET['fechaNacimiento'];
        $fechaFutura=$_GET['fechaFutura'];
        
        $fechaNac=strtotime($fechaNacimiento);
        $fechaF=strtotime($fechaFutura);
        
        $anio=60*60*24*365.25;
        $diferencia=$fechaF-$fechaNac;
        if($diferencia<0){
            echo "La fecha futura debe de ser posterior a la de nacimiento";
        }else{
            $edad=$diferencia/$anio;
            echo "La edad será de " . floor($edad) ." años";
        }
      }else{
    ?>

    <form action="#" method="get">
        <label for="">Introduce tu fecha de nacimiento</label>
        <input type="date" name="fechaNacimiento"><br>
        <label for="">Introduce una fecha futura</label>
        <input type="date" name="fechaFutura"><br>
         
        </select>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
      }  
    ?>
</body>
</html>