<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Crea un formulario donde el usuario introduce una fecha a través de 3 cajas de texto, si no es
correcta se debe indicar en un mensaje; si es correcta se debe mostrar en el formato elegido.
Crea una lista desplegable con todas las posibilidades de formato que se te ocurran. -->
    <?php
      if(isset($_GET['enviar'])){
        $dia=$_GET['dia'];
        $mes=$_GET['mes'];
        $anio=$_GET['anio'];
        $formato=$_GET['formato'];
        
        $fecha=strtotime("$anio-$mes-$dia");
      
        if (!checkdate($mes,$dia,$anio)){
            echo "Fecha invalida";
        }else{
            echo 'La fecha es: ' .$a=date($formato,$fecha);?><br><?php

        }
      }else{
    ?>

    <form action="#" method="get">
        <label for="">Introduce día</label>
        <input type="text" name="dia"><br>
        <label for="">Introduce mes</label><br>
        <input type="text" name="mes"><br>
        <label for="">Introduce año</label><br>
        <input type="text" name="anio">
        <select name="formato">
            <option value="m/d/Y">"mm/dd/YY"</option>
            <option value="d/m/Y">"dd/mm/YY"</option>
            <option value="Y/m/d">"YY/mm/dd"</option>
        </select>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
      }  
    ?>
</body>
</html>