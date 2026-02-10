<?php
session_start();
$contador = 0;
if (!isset($_SESSION["productos"])) {
    $_SESSION["productos"] = [];
    if (file_exists("productos.txt")) {
        $file = fopen("productos.txt", "r");
        while (!feof($file)) {
            if ($linea = fgetcsv($file, 0, "-")) {
                $_SESSION["productos"][$linea[0]] = ["precio" => $linea[1], "imagen" => $linea[2]];
            }
        }
    }
}
if (!isset($_SESSION["cesta"])) {
    if (isset($_COOKIE["cesta"])) {
        $_SESSION["cesta"] = unserialize($_COOKIE["cesta"]);
    } else {
        $_SESSION["cesta"] = [];
    }
}
if (isset($_REQUEST["prod"])) {
    $prod = $_REQUEST["prod"];
    if (!isset($_SESSION["cesta"][$prod])) {
        $_SESSION["cesta"][$prod] = ["cantidad" => 1];
    } else {
        if (isset($_SESSION["cesta"][$prod]["cantidad"])) {
            $_SESSION["cesta"][$prod]["cantidad"]++;
        }
    }
    header("location: Ejercicio3_Index.php");
}
if (isset($_COOKIE["cesta"])) {
    $cantidad = [];
    $cantidad = unserialize($_COOKIE["cesta"]);
    foreach ($cantidad as $key => $value) {
        if (isset($value["cantidad"])) {
            $contador += $value["cantidad"];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            echo "<td><a href='Detalles.php?prod=" . $prod . "'><img src='img/" . $dato["imagen"] . "' width='150px' height='100px'></a></td>";
            echo "<form action='#' method='post'>";
            echo "<input type='hidden' name='prod' value='" . $prod . "'>";
            echo "<td><input type='submit' value='Comprar' required></td>";
            echo "</form>";
            echo "</tr>";
        }
        ?>
    </table>
    <form action="Administrar.php" method="post"><input type="submit" value="Administrar"></form>

    </form>
    <?php
    ?>
</body>
<?php
setcookie("cesta", serialize($_SESSION["cesta"]), time() + 7 * 24 * 60 * 60);
?>

</html>