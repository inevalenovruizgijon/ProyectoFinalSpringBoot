<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['bloque']) && isset($_GET['piso'])) {
        $bloque = $_GET['bloque'];
        $piso = $_GET['piso'];
        if ($bloque > 0 && $bloque <= 10 && $piso > 0 && $piso <= 7) {
            echo "<h1>Usted ha llamado al piso $piso del bloque $bloque</h1>";
        } else {
            echo "<h1>Datos de llamada no válidos.</h1>";
        }
        echo '<p><a href="?">Volver a la tabla</a></p>';
    } else {

        echo '<h1>Bloques y Pisos</h1>';
        echo '<table border="1" cellpadding="5" cellspacing="0">';
        echo '<tr><th>Bloque</th><th>Piso</th><th>Llamar</th></tr>';
        for ($bloque = 1; $bloque <= 10; $bloque++) {
            for ($piso = 1; $piso <= 7; $piso++) {
                echo "<tr>";
                echo "<td>$bloque</td>";
                echo "<td>$piso</td>";
                echo "<td>
                    <form method='get' style='margin:0'>
                        <input type='hidden' name='bloque' value='$bloque'>
                        <input type='hidden' name='piso' value='$piso'>
                        <button type='submit'>Llamar</button>
                    </form>
                  </td>";
                echo "</tr>";
            }
        }
        echo '</table>';
    }
    ?>
</body>

</html>