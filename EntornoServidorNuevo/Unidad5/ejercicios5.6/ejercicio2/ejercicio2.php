<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST['n'])) {
        $contador = $_POST['contador'];
        $numeroTexto = $_POST['numeroTexto'] . " " . $_POST['n'];
    } else {
        $contador = 0;
        $numeroTexto = "";
    }
    if ($contador == 10) { //mostrar numeros
        $numeroTexto = trim($numeroTexto);
        $numero = explode(" ", $numeroTexto);
        echo "Los numeros introducidos son: <br>";
        $maximo=max($numero); //PHP_INT_MAX
        $minimo=min($numero); //PHP_INT_MIN
        foreach ($numero as $n) {
            echo "$n ";
            if($n==$maximo){
                echo "maximo";
            }if($minimo==$n){
                echo "mínimo";
            }
            echo "<br>";
        }
    } else {
    ?>
        <form action="#" method="post">
            <h2>Introduce 10 numeros</h2>
            <input type="text" id="numeroTexto" name="n" autofocus>
            <input type="submit" value="Aceptar">
            <input type="hidden" value="<?= ++$contador ?>" name="contador">
            <input type="hidden" value="<?=$numeroTexto ?>" name="numeroTexto">
        </form>

    <?php
    }
    
    ?>
</body>

</html>