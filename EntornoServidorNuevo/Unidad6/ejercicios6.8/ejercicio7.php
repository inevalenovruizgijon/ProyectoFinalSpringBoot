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
        <br>
        <label for="">Introduce la palabra</label>
        <input type="text" name="palabra">
        <input type="submit" name="enviar">
    </form>
    <?php
    if(isset($_GET['enviar'])){
    $frase=$_GET['frase'];
    $palabra=$_GET['palabra'];
    $frase = strtolower($frase);
    $palabra = strtolower($palabra);
    $arrayPalabras = explode(' ', trim($frase));
    foreach ($arrayPalabras as $p) {
        if ($p == $palabra) {
            echo "La palabra '$palabra' está en la frase\n";
            return;
        }
    }
    echo "La palabra '$palabra' no está en la frase\n";  
}
    ?>
</body>
</html>