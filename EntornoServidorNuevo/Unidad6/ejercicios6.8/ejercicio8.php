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
        <input type="submit" name="enviar">
    </form>
    <?php
    if(isset($_GET['enviar'])){
    $frase = $_GET['frase'];
    $array = str_split($frase);

    $ascii = ""; 
    foreach ($array as $c) {
        $ascii .= ord($c); 
    }
    echo "Códigos ASCII concatenados: " . $ascii . "<br>";
    $resultado = ""; 
    $i = 0;
    $len = strlen($ascii);

    while ($i < $len) {
        $num3 = substr($ascii, $i, 3);
        if (intval($num3) > 127) {
            $num2 = substr($ascii, $i, 2);
            $resultado .= chr(intval($num2)); 
            $i += 2;
        } else {
            $resultado .= chr(intval($num3)); 
            $i += 3;
        }
    }
    echo "Frase descifrada: $resultado";
}
    ?>
</body>
</html>