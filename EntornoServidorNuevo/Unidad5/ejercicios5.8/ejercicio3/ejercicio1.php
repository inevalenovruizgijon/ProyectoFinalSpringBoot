<?php

$imagen_correcta = "gato";
$limite_intentos = 15;
$filas = 10;
$columnas = 10;

$intentos = 0;

$estado = array_fill(0, $filas*$columnas, false);

if (isset($_POST['estado'])) {
    $estado = unserialize($_POST['estado']);
}

if (isset($_POST['intentos'])) {
    $intentos = (int)$_POST['intentos'];
}

if (isset($_POST['click'])) {
    $pos = (int)$_POST['click'];
    if (!$estado[$pos]) {
        $estado[$pos] = true;
        $intentos++;
    }
}

$mensaje = "";
$mostrar_completo = false;
if (isset($_POST['respuesta'])) {
    $respuesta = trim($_POST['respuesta']);
    if ($respuesta === $imagen_correcta) {
        $mensaje = "¡Has acertado!";
        $mostrar_completo = true;
    } else if ($intentos >= $limite_intentos) {
        $mensaje = "Has perdido. La imagen correcta es: " . $imagen_correcta;
        $mostrar_completo = true;
    }
}

$todas_descubiertas = !in_array(false, $estado);
if ($todas_descubiertas) {
    $mensaje = "Has descubireto toda la imagen";
    $mostrar_completo = true;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivina la imagen</title>
    <style>
        table {
            border-collapse: collapse;
            width: 500px;
            height: 500px;
            background-image: url('istockphoto-1443562748-612x612.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        td {
            width: 10%;
            height: 10%;
            border: 1px solid red;
            background-color: rgba(0,0,0,100);
            cursor: pointer;
        }
        td.descubierto {
            background-color: transparent;
        }
    </style>
</head>
<body>

<h1>Adivina la imagen oculta</h1>

<?php if ($mensaje): ?>
<h2><?= $mensaje ?></h2>
<?php endif; ?>

<form method="post">
<table>
    <?php
    for ($i=0; $i<$filas; $i++) {
        echo "<tr>";
        for ($j=0; $j<$columnas; $j++) {
            $pos = $i * $columnas + $j;
            $clase = $estado[$pos] ? "descubierto" : "";
            $bgposx = (-$i * 10) . "%";
            $bgposy = (-$i * 10) . "%";
            ?>
            <td class="<?= $clase ?>" style="background-position: <?= $bgposx ?> <?= $bgposy ?>">
                <?php if (!$estado[$pos] && !$mostrar_completo): ?>
                <button name="click" value="<?= $pos ?>" style="width:100%; height:100%; opacity:0; cursor:pointer; background:none; border:none;"></button>
                <?php endif; ?>
            </td>
            <?php
        }
        echo "</tr>";
    }
    ?>
</table>
<input type="hidden" name="estado" value="<?= serialize($estado) ?>">
<input type="hidden" name="intentos" value="<?= $intentos ?>">

<?php if (!$mostrar_completo): ?>
    <label>¿Qué imagen es? <input type="text" name="respuesta"></label>
    <button type="submit">Comprobar</button>
<?php else: ?>
    <img src="istockphoto-1443562748-612x612.jpg" alt="Imagen completa" style="width:500px; height:500px; margin-top:20px;">
<?php endif; ?>

<p>Intentos usados: <?= $intentos ?> / <?= $limite_intentos ?></p>

</form>

</body>
</html>
