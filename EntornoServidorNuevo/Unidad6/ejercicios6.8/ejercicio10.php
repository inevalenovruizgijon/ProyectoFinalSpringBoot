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
    $nombre=$_GET['nombre'];
    $partes = explode(' ', trim($nombre));
    $nombreMayus = '';
    $iniciales = '';
    foreach ($partes as $p) {
        if ($p =='') continue;
        $nombreMayus .= ucfirst($p) . ' ';
        $iniciales .= $p[0];
    }
    echo "Nombre capitalizado: " . trim($nombreMayus);?><br><?php
    echo "Iniciales: $iniciales";
}
    else{

    ?>
    <form action="#">
        <label for="">Introduce tu nombre completo</label>
        <input type="text" name="nombre">
        <br>
        <input type="submit" name="enviar">
    </form>
    <?php
    }  
    ?>
</body>
</html>