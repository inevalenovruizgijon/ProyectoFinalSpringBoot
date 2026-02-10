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
        $array=explode(" ",$frase);
        $inicio="";
        $fin="";
        foreach ($array as $a) {
            if($a != ""){
                if($inicio=="") $inicio=$a;
                $fin=$a;
            }
        } 
        $inicioo = strtolower($inicio);
        $finn = strtolower($fin);
        if ($inicioo == $finn) {
            echo "Comienza y termina con la misma palabra\n";
        } 
         else {
            echo "No comienza y termina con la misma palabra\n";
        }  
    }
?>
</body>
</html>