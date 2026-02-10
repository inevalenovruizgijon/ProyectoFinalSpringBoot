<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'funciones1.php';

      if(isset($_GET['enviar'])){
        $numeros=[
            $_GET['n1'],
            $_GET['n2'],
            $_GET['n3'],
            $_GET['n4'],
            $_GET['n5'],
            $_GET['n6'],
            $_GET['n7'],
        ];
        $nombreCombinacion=$_GET['nombreCombinacion'];
        $numerosA=combinacion($numeros);
        echo imprimirApuesta($numerosA,$nombreCombinacion);

      }else{
        ?>
        <form action="#" method="get">
        <label for="" >Introduce el nombre de la combinacion</label>
        <input type="text" name="nombreCombinacion"><br>
        <label for="">Introduce los numeros</label><br>
        <input type="number" max="49" min="1" name="n1">
        <input type="number" max="49" min="1" name="n2">
        <input type="number" max="49" min="1" name="n3">
        <input type="number" max="49" min="1" name="n4">
        <input type="number" max="49" min="1" name="n5">
        <input type="number" max="49" min="1" name="n6">
        <br>
        <label for="">Introduce el numero de serie</label>
        <input type="number" min="1" max="999" name="n7"><br>
        <input type="submit" name="enviar" value="Enviar">
        
    </form>
<?php
          
}

      
    ?>
    
</body>
</html>