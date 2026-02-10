<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Cartas baraja española</h1>

    <form action="" method="post">
        <label for="">Cuantas cartas quieres (max 40)</label>
        <input type="number" name="cantidad" step="any">
        <input type="submit" value="Enviar">
    </form>

    <?php

    function mostrarEstado($codEstado, $mensaje)
    {
        echo "STATUS: " . $codEstado;
        echo "<br>" . $mensaje;
    }

    if (isset($_REQUEST['cantidad'])) {
        $url = "http://localhost/Entorno_Servidor/Unidad_12/Ejercicio%20para%20resolver%2012.7/Ejercicio%202/Service/service.php";
        $parametros = '?cantidad=' . $_REQUEST['cantidad'];
        $data = @file_get_contents($url . $parametros);
        $respuesta = json_decode($data);
        $codEstado = substr($http_response_header[0], 9, 3);
        $mensaje = substr($http_response_header[0], 13);
        if ($codEstado == 200) {
            $respuesta;
            mostrarEstado($codEstado, $mensaje);
        } else {
            mostrarEstado($codEstado, $mensaje);
        }
    }

    ?>


</body>

</html>