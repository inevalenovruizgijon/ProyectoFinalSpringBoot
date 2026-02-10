<?php
$acierto = "gato";
$imagenes = [
    ["fila-1-columna-1.png", "fila-1-columna-2.png", "fila-1-columna-3.png"],
    ["fila-2-columna-1.png", "fila-2-columna-2.png", "fila-2-columna-3.png"],
    ["fila-3-columna-1.png", "fila-3-columna-2.png", "fila-3-columna-3.png"]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagen = $_POST['imagen'] ?? '';
} else {
    $imagen = $_GET['imagen'] ?? 'perro';
}

$color = ($imagen === $acierto) ? 'transparent' : 'gray';
$bordercolor = ($imagen === $acierto) ? 'transparent' : 'red';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Adivina la imagen</title>
<style>
    main {
        display: flex;
        justify-content: center;
    }
    table {
        background-image: url("istockphoto-1443562748-612x612.jpg");
        border-collapse: collapse;
        width: 740px;
        height: 880px;
        background-repeat: no-repeat;
    }
    tr, td {
        margin: 0;
        padding: 0;
        border: 2px solid <?= $bordercolor ?>;
        text-align: center;
        vertical-align: middle;
    }
    a {
        background-color: <?= $color ?>;
        display: block;
        padding: 137px 130px;
        text-decoration: none;
    }
    a img {
        width: 100%;
        height: auto;
        display: block;
    }
    a.seleccionado {
        border: 5px solid gold;
        background-color: rgba(255, 215, 0, 0.3);
        padding: 132px 125px; /* Reducir padding para que no cambie tamaño con el borde */
    }
    form {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 1em;
    }
    button {
        height: 2.5em;
        width: 8em;
        color: white;
        background-color: #828282ff;
        border-radius: 1em;
        border: none;
        cursor: pointer;
    }
    h1 {
        text-align: center;
        font-size: 5em;
    }
</style>
</head>
<body>

<?php if ($imagen === $acierto): ?>
    <h1>Has acertado</h1>
<?php else: ?>
    <h1>Adivina la imagen</h1>
<?php endif; ?>

<main>
    <table>
        <?php
        foreach ($imagenes as $fila) {
            echo "<tr>";
            foreach ($fila as $img) {
                $clase = ($img === $imagen) ? "seleccionado" : "";
                echo "<td><a href='?imagen=$img' class='$clase'><img src='$img' alt='Imagen'></a></td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</main>

<?php if ($imagen !== $acierto): ?>
<div>
    <form method="post" action="">
        <fieldset>
            <legend><h2>¿Qué imagen es?</h2></legend>
            <input type="text" name="imagen" required>
            <button type="submit">Aceptar</button>
        </fieldset>
    </form>
</div>
<?php endif; ?>

</body>
</html>
