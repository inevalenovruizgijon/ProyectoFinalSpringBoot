<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // $color = ["rojo", "amarillo", "azul", "verde", "blanco"];
    // echo "La camiseta que me pondre mañana será de color:", $color[rand(1, 5)], "<br>";
    // echo "<b>Notas </b><br>";

    // for ($i = 0; $i < 10; $i++) {
    //     $n[$i] = rand(0, 10);
    // }
    // foreach ($n as $i => $elemento)
    //     echo "nota $i: $elemento<br>";
    // ?>
    <?php

    // EJEMPLO 1

    // echo "<b>Notas:</b><br>";
    // for ($i = 0; $i < 10; $i++) {
    //     // números aleatorios entre 0 y 10 (ambos incluidos)
    //     $n[$i] = rand(0, 10);
    // }

    // la variable $i recoge el índice
    // y la variable $elemento recoge el contenido del índice


    // foreach ($n as $i => $elemento) {
    //     echo "Nota $i: ", $elemento, "<br>";
    // }

    // EJEMPLO 2


    // $color = ["verde", "amarillo", "rojo", "azul", "blanco", "gris"];
    // echo "Mañana me pongo una camiseta de color ", $color[rand(0, 5)], ".";

    //  EJEMPLO 3

    //$estatura = array("Rosa" => 168, "Ignacio" => 175, "Daniel" => 172, "Rubén" => 182);
    //echo "La estatura de Daniel es ", $estatura['Daniel'], " cm <br>";
    //echo "La estatura de Rosa es $estatura[Rosa] cm <br> <br>";

    //foreach ($estatura as $nombre => $altura) {
    //    echo "La altura de ", $nombre, " es ", $altura, "<br>";
    //}

    //for($i=0; i<count($persona);$i++){
    //    foreach ($persona[i] as $campo => $) {
    # code...
    //    }
    //}


    // foreach ($persona as $dani => $per) {
    //         echo "DNI: $dni ";
    //     foreach ($pers as $campo => $valor) {
    //         echo "$campo: <b>,$valor,</b>";
    //     }
    // }


    if (isset($_POST['n'])) {
        $contadorNumeros = $_POST['contadorNumeros'];
        $numeroTexto = $_POST['numeroTexto'] . " " . $_POST['n'];
    } else {
        $contadorNumeros = 0;
        $numeroTexto = "";
    }
    // Muestra los números introducidos
    if ($contadorNumeros == 6) {
        $numeroTexto = substr($numeroTexto, 1); // quita el primer espacio
        $numero = explode(" ", $numeroTexto);
        echo "Los números introducidos son: ";
        foreach ($numero as $n) {
            echo $n, " ";
        }
        $cadena= implode("-",$numero);
        echo "<hr> $cadena";
      
        
      ?>
      <form action="prueba2.php" method="post">
        <input type="hidden" name="texto">
        <input type="submit" value="enviar cadena del array">
      </form>
      <?php
          
      
    } else {
    ?>
        <form action="#" method="post">
            Introduzca un número:
            <input type="number" name="n" autofocus>
            <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>">
            <input type="hidden" name="numeroTexto" value="<?= $numeroTexto ?>">
            <input type="submit" value="OK">
        </form>
    <?php
    }

    ?>
</body>
</body>

</html>