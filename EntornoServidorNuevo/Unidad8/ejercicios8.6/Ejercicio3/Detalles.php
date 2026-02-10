<?php
session_start();
if (isset($_REQUEST["prod"])) {
    $prod = $_REQUEST["prod"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles</title>
    </head>

    <body>
        <?php
        echo "<img src='img/" . $_SESSION["productos"][$prod]["imagen"] . "' width='250px' height='250px'>";
        echo "<p><b>Producto:</b>" . $prod . "</p>";
        echo "<p><b>Precio:</b>" . $_SESSION["productos"][$prod]["precio"] . "$</p>";
        ?>
        <a href="Ejercicio3_Index.php">Volver</a>
    </body>

    </html>
<?php

}
?>