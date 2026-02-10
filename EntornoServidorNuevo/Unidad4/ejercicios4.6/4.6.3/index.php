<?php
session_start();

if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0;
}

$acierto = "gato";

$imagen = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imagen = $_POST['imagen'] ?? null;
} elseif (isset($_GET['imagen'])) {
    $imagen = $_GET['imagen'];
    $_SESSION['intentos']++;
} else {
    $imagen = null;
}

$mensajeIntentos = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $imagen !== null) {
    if (strtolower(trim($imagen)) === $acierto) {
        $mensajeIntentos = "¡Correcto! Has adivinado en " . $_SESSION['intentos'] . " intentos.";
    } else {
        $mensajeIntentos = "Incorrecto. Llevas " . $_SESSION['intentos'] . " intentos.";
    }
}

if ($imagen === $acierto) {
    $color = 'transparent';
    $bordercolor = 'transparent';
} else {
    $color = 'gray';
    $bordercolor = 'red';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        }
        a {
            background-color: <?= $color ?>;
            padding: 137px 130px;
            display: block;
            text-decoration: none;
        }
        form {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 1em;
        }
        select {
            margin-bottom: 1em;
        }
        button {
            height: 2.5em;
            width: 8em;
            color: white;
            background-color: #828282ff;
            border-radius: 1em;
        }
        h1, h2 {
            text-align: center;
        }
        #mensaje-intentos {
            text-align: center;
            font-weight: bold;
            margin-top: 1em;
        }
    </style>
</head>
<body>
    <h1><?= ($imagen === $acierto) ? "Has acertado" : "Adivina la imagen" ?></h1>

    <p style="text-align:center;">Intentos actuales: <?= $_SESSION['intentos'] ?></p>

    <main>
        <table>
            <tr>
                <td><a href="?imagen=fila-1-columna-1.png"></a></td>
                <td><a href="?imagen=fila-1-columna-2.png"></a></td>
                <td><a href="?imagen=fila-1-columna-3.png"></a></td>
            </tr>
            <tr>
                <td><a href="?imagen=fila-2-columna-1.png"></a></td>
                <td><a href="?imagen=fila-2-columna-2.png"></a></td>
                <td><a href="?imagen=fila-2-columna-3.png"></a></td>
            </tr>
            <tr>
                <td><a href="?imagen=fila-3-columna-1.png"></a></td>
                <td><a href="?imagen=fila-3-columna-2.png"></a></td>
                <td><a href="?imagen=fila-3-columna-3.png"></a></td>
            </tr>
        </table>
    </main>

    <?php if ($imagen !== $acierto): ?>
    <div>
        <form action="" method="post">
            <fieldset>
                <legend>
                    <h2>¿Qué imagen es?</h2>
                </legend>
                <input type="text" name="imagen" required>
                <button type="submit">Aceptar</button>
            </fieldset>
        </form>
    </div>
    <?php endif; ?>

    <?php if ($mensajeIntentos): ?>
    <div id="mensaje-intentos"><?= htmlspecialchars($mensajeIntentos) ?></div>
    <?php endif; ?>
</body>
</html>