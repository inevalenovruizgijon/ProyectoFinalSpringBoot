<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="#">
        <label for="">Introduce una frase</label>
        <input type="text" name="frase">
        <input type="submit" name="enviar">
    </form>
    <?php
        if(isset($_GET['enviar'])){
        $frase=$_GET['frase'];
        $frase=trim($frase);
        $array=explode(' ',$frase);
        $contador=0;

        foreach ($array as $a) {
            if($a !=""){
                $contador++;
            }
        }
        echo "$frase"; ?> <br><?php
        echo "La cantidad de palabras de la frase son: $contador";    
        }
    
    ?>
</body>
</html>