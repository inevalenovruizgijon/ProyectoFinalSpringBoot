<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Ejercicio 11
Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción). Utiliza
un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra en español y
dará la correspondiente traducción en inglés -->

    <?php
    if (isset($_SESSION['diccionario'])) {
        $diccionario = [
        "fútbol" => "football",
        "play" => "jugar",
        "comer" => "eat",
        "ordenador" => "computer",
    ];  
        
    }
    ?>
    <h1>Ejercicio 11: Diccionario</h1>
    <form action="#" method="post">
        <label for="">Introduce la palabra en español</label><br>
        <input type="text" name="espanol"><br>
        <!-- <label for="">Introduce la palabra en inglés</label><br>
        <input type="text" name="ingles"><br> -->
        <input type="submit" name="boton">
    </form>

    <?php
    $espanol = $_POST['espanol'];
    $ingles=$_POST['ingles'];
    $existe=true;
    if (array_key_exists($espanol, $diccionario)) {
        $traduccion = $diccionario[$espanol];
        echo "<h2>La traducción es $traduccion</h2>";
    } else {
        $existe=false;

    ?>
        <form action="#" method="post">
            <br>
            <label for="">Introduzca la traducción</label><br>
            <input type="text" name="ingles"><br>
            <input type="submit" name="enviar">
        </form>

        
    <?php
        $ingles = $_POST['ingles'];
    }
    
    ?>
</body>

</html>