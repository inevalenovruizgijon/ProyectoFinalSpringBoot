<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php
        $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        if(isset($_GET['enviar'])){
            $dia=$_GET['dia'];
            $mes=$_GET['mes'];
            $anio=$_GET['anio'];
            
            $fecha=strtotime("$anio-$mes-$dia");
            if(checkdate($mes,$dia,$anio)==false){
                echo "Fecha invalida";
            }else{

                $a=date("w",$fecha);?><br><?php
                echo "La fecha $fecha corresponde al dia: " . $dias[$a];
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
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
      }  
    ?>
</body>
</html>