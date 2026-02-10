<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Mostrar el día de la semana que correspondería, una vez transcurridos un número de años,
meses, y días elegidos por el usuario, a partir de la fecha actual. -->
      <?php
        $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        if(isset($_GET['enviar'])){
            $dia=$_GET['dia'];
            $mes=$_GET['mes'];
            $anio=$_GET['anio'];
            
            $fecha=strtotime("$anio-$mes-$dia");
            $fechaActual=strtotime("now");
            $fechaSiguiente=strtotime("+$anio year +$mes month +$dia days",$fechaActual);
            $diaSiguiente=date("w",$fechaSiguiente);
            echo "El dia de la semana será " . $dias[$diaSiguiente];
        }else{
        ?>

    <form action="#" method="get">
        <label for="">Introduce día</label>
        <input type="text" name="dia" required><br>
        <label for="">Introduce mes</label><br>
        <input type="text" name="mes" required><br>
        <label for="">Introduce año</label><br>
        <input type="text" name="anio" required>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
      }  
    ?>

</body>
</html>