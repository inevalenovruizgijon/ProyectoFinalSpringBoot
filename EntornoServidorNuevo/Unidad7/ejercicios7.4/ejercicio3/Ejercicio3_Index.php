<?php
session_start();
$contador = 0;
if (!isset($_SESSION["productos"])) {
    $_SESSION["productos"] = [
        "raton" => ["precio" => 6, "imagen" => "img/raton.jpg", "detalles" => "El ratón Inphic LED ofrece estilo y rendimiento en un diseño elegante con iluminación LED ajustable, brindando comodidad ergonómica y precisión para una experiencia de usuario excepcional."],
        "teclado" => ["precio" => 11, "imagen" => "img/teclado.jpg", "detalles" => "El teclado Inphic presenta un diseño ergonómico y retroiluminación LED, combinando comodidad y estilo. Sus teclas silenciosas y funciones programables ofrecen una experiencia de escritura eficiente y personalizada."],
        "monitor" => ["precio" => 80, "imagen" => "img/monitor.jpg", "detalles" => "El monitor Inphic cautiva con su pantalla de alta resolución y colores vibrantes, brindando una experiencia visual inmersiva. Con un diseño delgado y moderno, este monitor combina elegancia con rendimiento para satisfacer las necesidades tanto de trabajo como de entretenimiento."],
        "joystick" => ["precio" => 33, "imagen" => "img/joystick.jpg", "detalles" => "El mando de PS5 de Inphic ofrece comodidad y tecnología avanzada con retroalimentación háptica, gatillos adaptativos y diseño elegante para una experiencia de juego excepcional."]
    ];
}
if (isset($_COOKIE["cesta"])) {
    $cantidad = [];
    $cantidad = unserialize($_COOKIE["cesta"]);
    foreach ($cantidad as $key => $value) {
        $contador += $value["cantidad"];
    }
}
if (isset($_REQUEST["prod"])) {
    $prod = $_REQUEST["prod"];
    if (!isset($_SESSION["cesta"][$prod])) {
        $_SESSION["cesta"][$prod] = ["cantidad" => 1];
    } else {
        $_SESSION["cesta"][$prod]["cantidad"]++;
    }
    header("refresh:0");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index_styles.css" type="text/css">
    <title>Index</title>
</head>

<body>
    <table border="1">
        <tr>
            <td colspan="3">La tiendecita</td>
            <td> <a href="Cesta.php">Cesta <?= $contador ?> Prod</a></td>
        </tr>
        <tr>
            <td>Producto</td>
            <td>Precio</td>
            <td>Imagen</td>
            <td></td>
        </tr>

        <?php
        foreach ($_SESSION["productos"] as $prod => $dato) {
            echo "<tr>";
            echo "<td>" . $prod . "</td>";
            echo "<td>" . $dato["precio"] . "</td>";
            echo "<td><a href='Detalles.php?prod=" . $prod . "'><img src='" . $dato["imagen"] . "' width='150px' height='100px'></a></td>";
            echo "<form action='#' method='post'>";
            echo "<input type='hidden' name='prod' value='" . $prod . "'>";
            echo "<td><input type='submit' value='Comprar' required></td>";
            echo "</form>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    setcookie("cesta", serialize($_SESSION["cesta"]), time() + 7 * 24 * 60 * 60);
    ?>
</body>

</html>