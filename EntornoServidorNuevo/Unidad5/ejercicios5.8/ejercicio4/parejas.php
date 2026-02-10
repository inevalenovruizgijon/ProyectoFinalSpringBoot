<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Parejas</title>
</head>
<body>
<?php
$personas = [];
if (isset($_POST['personas']) && !empty($_POST['personas'])) {
    $personas = unserialize($_POST['personas']);
    if ($personas === false) {
        $personas = [];
    }
}
$seleccionado = isset($_POST['seleccionado']) ? $_POST['seleccionado'] : null;
?>


<h2>Personas</h2>
<table >
    <tr><th>Nombre</th><th>Sexo</th><th>Orientación</th><th>Seleccionar</th></tr>
    <?php foreach ($personas as $index => $persona): ?>
    <tr style="background-color: <?= $index == $seleccionado ? 'lightblue' : 'white' ?>">
        <td><?= htmlspecialchars($persona['nombre']) ?></td>
        <td><?= htmlspecialchars($persona['sexo']) ?></td>
        <td><?= htmlspecialchars($persona['orientacion']) ?></td>
        <td>
            <form method="post" style="margin:0;">
                <input type="hidden" name="personas" value="<?= htmlspecialchars(serialize($personas)) ?>">
                <input type="hidden" name="seleccionado" value="<?= $index ?>">
                <button type="submit">Seleccionar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


<?php if ($seleccionado !== null): ?>
<h2>Personas compatibles con <?= htmlspecialchars($personas[$seleccionado]['nombre']) ?></h2>
<table >
    <tr><th>Nombre</th><th>Sexo</th><th>Orientación</th><th>Formar pareja</th></tr>
    <?php
    for ($i = 0; $i < count($personas); $i++) {
        $persona = $personas[$i];
        if ($i === (int)$seleccionado) {
            continue;
        }
        $p1 = $personas[$seleccionado];
        $p2 = $persona;
        $compatible = false;


        if ($p1['orientacion'] == 'het') {
            if ($p1['sexo'] != $p2['sexo'] && $p2['orientacion'] != 'hom') {
                $compatible = true;
            }
        } elseif ($p1['orientacion'] == 'hom') {
            if ($p1['sexo'] == $p2['sexo'] && $p2['orientacion'] != 'het') {
                $compatible = true;
            }
        } elseif ($p1['orientacion'] == 'bis') { 
            if ($p1['sexo'] == $p2['sexo'] && $p2['orientacion'] != 'het') {
                $compatible = true;
            } elseif ($p1['sexo'] != $p2['sexo'] && ($p2['orientacion'] == 'bis' || $p2['orientacion'] == 'hom')) {
                $compatible = true;
            }
        }


        if ($compatible) {
            ?>
            <tr>
                <td><?= htmlspecialchars($persona['nombre']) ?></td>
                <td><?= htmlspecialchars($persona['sexo']) ?></td>
                <td><?= htmlspecialchars($persona['orientacion']) ?></td>
                <td>
                    <form method="post" action="mostrar_pareja.php" style="margin:0;">
                        <input type="hidden" name="persona1" value="<?= htmlspecialchars(serialize($personas[$seleccionado])) ?>">
                        <input type="hidden" name="persona2" value="<?= htmlspecialchars(serialize($persona)) ?>">
                        <button type="submit">Formar pareja</button>
                    </form>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<?php endif; ?>
</body>
</html>