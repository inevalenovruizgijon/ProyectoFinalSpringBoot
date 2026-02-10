<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ejercicio 10: Baraja española</h1>

   

    <!-- Ejercicio 10
        Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga cuántos puntos suman
        según el juego de la brisca. Emplea un array asociativo para obtener los puntos a partir del nombre de la
        figura de la carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras cogido de una
        baraja de verdad. -->
    <?php
        if(isset($_POST['boton'])){
            $baraja = [
            "As de espadas" => 11,
            "Tres de espadas" => 10,
            "Rey de espadas" => 4,
            "Caballo de espadas" => 3,
            "Sota de espadas" => 2,
            "Siete de espadas" => 0,
            "Seis de espadas" => 0,
            "Cinco de espadas" => 0,
            "Cuatro de espadas" => 0,
            "Dos de espadas" => 0,

            "As de bastos" => 11,
            "Tres de bastos" => 10,
            "Rey de bastos" => 4,
            "Caballo de bastos" => 3,
            "Sota de bastos" => 2,
            "Siete de bastos" => 0,
            "Seis de bastos" => 0,
            "Cinco de bastos" => 0,
            "Cuatro de bastos" => 0,
            "Dos de bastos" => 0,

            "As de oros" => 11,
            "Tres de oros" => 10,
            "Rey de oros" => 4,
            "Caballo de oros" => 3,
            "Sota de oros" => 2,
            "Siete de oros" => 0,
            "Seis de oros" => 0,
            "Cinco de oros" => 0,
            "Cuatro de oros" => 0,
            "Dos de oros" => 0,

            "As de copas" => 11,
            "Tres de copas" => 10,
            "Rey de copas" => 4,
            "Caballo de copas" => 3,
            "Sota de copas" => 2,
            "Siete de copas" => 0,
            "Seis de copas" => 0,
            "Cinco de copas" => 0,
            "Cuatro de copas" => 0,
            "Dos de copas" => 0,
        ];
    
       
        
        $aleatorias=array_rand($baraja,10);
        $total=0;
        foreach ($aleatorias as $valor) {
            $puntos=$baraja[$valor];
            $total+=$puntos;
            echo "$valor <br>";
            
        }
        echo "<br>$total";
        }
    ?>

     <form action="#" method="post" >
        <input type="submit" name="boton">
    </form>
</body>

</html>