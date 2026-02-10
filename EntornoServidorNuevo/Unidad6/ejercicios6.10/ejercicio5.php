<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 <body>
     <!-- Ejercicio 5.
Pedir un día de la semana en un formulario, seleccionándolo desde una lista desplegable.
Mostrar la fecha correspondiente al próximo día de la semana elegido por el usuario -->
    <?php
            if(isset($_GET['enviar'])){
                $dia = $_GET['dia'];
                $fechaProxima = strtotime("next $dia");
                echo date("d-m-Y", $fechaProxima) . " es el siguiente.";
            }else{
            ?>

        <form action="#" method="get">
            <label>Selecciona el dia de la semana</label>
            <select name="dia">
                <option value="Monday">Lunes</option>
                <option value="Tuesday">Martes</option>
                <option value="Wednesday">Miércoles</option>
                <option value="Thursday">Jueves</option>
                <option value="Friday">Viernes</option>
                <option value="Saturday">Sábado</option>
                <option value="Sunday">Domingo</option>
            </select> 
            <input type="submit" value="Enviar" name="enviar">   
        </form>
        <?php
        }  
        ?>

</body>
</html>