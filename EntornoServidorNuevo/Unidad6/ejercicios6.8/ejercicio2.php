<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#">
        <label>Introdcuce una vocal para cambiar</label>
        <input type="text" name="vocal">
        <input type="submit" name="enviar" value="enviar">
    </form>
    <?php
        
    $frase="Tengo una hormiguita en la patita, que me esta haciendo
cosquillitas y no me puedo aguantar";    
    if(isset($_GET['enviar'])){
        $vocal=$_GET['vocal'];
    $vocal = strtolower($vocal);
    if (!in_array($vocal, ['a','e','i','o','u'])) {
        echo "Error: No es una vocal válida.\n";
        return;
    }
    $nuevaFrase = str_replace(['a','e','i','o','u','A','E','I','O','U'], $vocal, $frase);
    echo $nuevaFrase . "\n";
    }
  ?>
</body>
</html>