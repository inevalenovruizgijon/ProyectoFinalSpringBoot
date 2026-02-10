<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Conversor de Pesetas a euros</h1>

    <form action="" method="post">
        <label for="">Conversion de pesetas a euros</label>
        <input type="number" name="cantidad" step="any">
        <select name="conversion">
            <option value="pesetas">Pesetas</option>
            <option value="euros">Euros</option>
        </select>
        <input type="submit" name="convertir" value="Enviar">
    </form>

    <?php
    if (isset($_REQUEST['convertir'])) {
        $url = "http://localhost/Entorno_Servidor/Unidad_12/Ejercicio%20para%20resolver%2012.7/Ejercicio%201/Service/service.php";

        function mostrarEstado($codEstado, $mensaje)
        {
            echo "STATUS: " . $codEstado;
            echo "<br>" . $mensaje;
        }

        $parametros = '?cantidad=' . $_REQUEST['cantidad'] . '&conversion=' . $_REQUEST['conversion'];
        $data = @file_get_contents($url . $parametros);
        $respuesta = json_decode($data);
        $codEstado = substr($http_response_header[0], 9, 3);
        $mensaje = substr($http_response_header[0], 13);
        if ($codEstado == 200) {
            echo '<h1>La conversion a ' . $respuesta->moneda . ' es de ' . $respuesta->total . '</h1>';
            mostrarEstado($codEstado, $mensaje);
        } else {
            mostrarEstado($codEstado, $mensaje);
        }
        
    }
    ?>

</body>

</html>