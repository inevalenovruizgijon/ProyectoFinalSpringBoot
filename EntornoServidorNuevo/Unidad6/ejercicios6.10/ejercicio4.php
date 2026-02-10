<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php
        $meses = [
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    ];
      if(isset($_GET['enviar'])){
        $fecha=$_GET['dia'];
        
        $fechaFinal=strtotime($fecha);
        $dia=date("d",$fechaFinal);
        $mes=date("n",$fechaFinal);
        $anio=date("Y",$fechaFinal);

        echo "$dia de " . $meses[$mes]. " de $anio";
      }
        else{
    ?>

    <form action="#" method="get">
        <label for="">Hora</label>
        <input type="date" name="dia"><br>
        
        </select>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
      }  
    ?>
</body>
</html>