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
        $vuelta=$frase;
        do {
        echo $frase . "\n";
        $frase = substr($frase, -1) . substr($frase, 0, -1);
        } while ($frase !== $vuelta);

        }
    ?>    
</body>
</html>