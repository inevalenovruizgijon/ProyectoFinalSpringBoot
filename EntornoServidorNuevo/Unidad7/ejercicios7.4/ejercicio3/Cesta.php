<?php
session_start();
if (!isset($_SESSION["cesta"])) {
    if (isset($_COOKIE["cesta"])) {
        $_SESSION["cesta"] = unserialize($_COOKIE["cesta"]);
    } else {
        $_SESSION["cesta"] = [];
    }
}
if (isset($_REQUEST["eliminar"])) {
    $elimProd = $_REQUEST["eliminar"];
    if ($_SESSION["cesta"][$elimProd]["cantidad"] == 1) {
        unset($_SESSION["cesta"][$elimProd]);
    } else {
        $_SESSION["cesta"][$elimProd]["cantidad"]--;
    }
}
if (isset($_REQUEST["vaciar"])) {
    unset($_SESSION["cesta"]);
    $_SESSION["cesta"] = [];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index_styles.css" type="text/css">
    <title>Cesta</title>
</head>

<body>
    <table border="1">
        <tr>
            <td colspan="4">PRODUCTOS EN TU CESTA</td>
        </tr>

        <?php
        // $carrito = unserialize($_COOKIE["cesta"]);
        $contador = 0;
        $total = 0;
        foreach ($_SESSION["cesta"] as $prod => $datos) {
            echo "<form action='#' method='post'>";
            echo "<tr>";
            echo "<td>" . $prod . "</td>";
            echo "<td>" . $datos["cantidad"] . "</td>";
            echo "<td><img src='" . $_SESSION["productos"][$prod]["imagen"] . "' alt='producto' width='150px' height='100px'></td>";
            echo "<input type='hidden' name='eliminar' value='" . $prod . "'>";
            echo "<td><input type='submit' value='Eliminar'></td></tr>";
            echo "</form>";
            $contador += $datos["cantidad"];
            $total += $datos["cantidad"] * $_SESSION["productos"][$prod]["precio"];
        }
        echo "<tr><td>Total</td><td>" . $contador . "</td><td>" . $total . "</td><td><a href='Cesta.php?vaciar=1'>Vaciar Cesta</a></td></tr>";
        ?>
    </table>
    <a href="Ejercicio3_Index.php">volver</a>
</body>

</html>
<?php
setcookie("cesta", serialize($_SESSION["cesta"]), time() + 7 * 24 * 60 * 60);

?>