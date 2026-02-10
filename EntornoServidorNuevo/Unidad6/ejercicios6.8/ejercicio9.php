<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    if(isset($_GET['enviar'])){
    $frase = $_GET['frase'];
    echo strrev($frase);
    }else{
        ?><form action="#">
        <label for="">Introduce una frase</label>
        <input type="text" name="frase">
        <br>
        <input type="submit" name="enviar">
    </form>
    <?php
    }
    ?>
    
</body>
</html>