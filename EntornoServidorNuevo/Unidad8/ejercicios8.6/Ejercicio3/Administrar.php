<?php
session_start();
function actualizarFichero()
{
    $file = fopen("productos.txt", "w");
    foreach ($_SESSION["productos"] as $prod => $value) {
        fwrite($file, trim($prod . "-" . implode("-", $value)) . PHP_EOL);
    }
    fclose($file);
}
if (isset($_REQUEST["eliminar"])) {
    $prodEliminar = $_REQUEST["prod"];
    if (file_exists("img/" . $_SESSION["productos"][$prodEliminar]["imagen"])) {
        unlink("img/" . $_SESSION["productos"][$prodEliminar]["imagen"]);
    }
    unset($_SESSION["productos"][$prodEliminar]);
}

if (isset($_REQUEST["insertar"])) {
    $nombre_archivo = $_FILES["productoNuevo"]["name"];
    $carpeta_destino = "img/";

    // Mover el archivo a la carpeta de destino
    $imagen_movida = move_uploaded_file(
        $_FILES["productoNuevo"]["tmp_name"],
        $carpeta_destino . $nombre_archivo
    );
    $nombre = $_REQUEST["nombre"];
    $precio = $_REQUEST["precio"];
    $_SESSION["productos"][$nombre] = ["precio" => $precio, "imagen" => $nombre_archivo];
    actualizarFichero();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <?php
        foreach ($_SESSION["productos"] as $prod => $dato) {
            echo "<tr>";
            echo "<td>" . $prod . "</td>";
            echo "<td>" . $dato["precio"] . "</td>";
            echo "<td><a href='Detalles.php?prod=" . $prod . "'><img src='img/" . $dato["imagen"] . "' width='150px' height='100px'></a></td>";
            echo "<form action='Administrar.php' method='post'>";
            echo "<input type='hidden' name='prod' value='" . $prod . "'>";
            echo "<td><input type='submit' value='Eliminar' name='eliminar'></td>";
            echo "</tr>";
            echo "</form>";
        }
        ?>
        <form enctype="multipart/form-data" action="Administrar.php" method="post">
            <tr>
                <td><input type="text" name="nombre" placeholder="Nombre..."></td>
                <td><input type="number" name="precio" placeholder="Precio..."></td>
                <td><input type="file" name="productoNuevo" accept="image/*"></td>
                <td><input type="submit" value="Insertar" name="insertar"></td>
            </tr>
        </form>
    </table>
    <a href="Ejercicio3_Index.php">Volver</a>
</body>

</html>
<?php
setcookie("cesta", serialize($_SESSION["productos"]), time() + 7 * 24 * 60 * 60);
?>