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
    $cadena=$_GET['cadena'];
    $valores = ['M'=>1000,'D'=>500,'C'=>100,'L'=>50,'X'=>10,'I'=>1];
    $cadena = strtoupper($cadena);
    $longitud = strlen($cadena);

    for ($i = 0; $i < $longitud; $i++) {
        if (!isset($valores[$cadena[$i]])) {
            echo "Error: entrada inválida";
            return ;
        }
    }

    $total = 0;
    for ($i = 0; $i < $longitud; $i++) {
        $total += $valores[$cadena[$i]];
    }
    
    echo "Valor decimal: $total";
}

    else{

    ?>
    <form action="#">
        <label for="">Introduce numeros romanos</label>
        <input type="text" name="cadena">
        <br>
        <input type="submit" name="enviar">
    </form>
    <?php
    }  
    ?>
</body>
</html>