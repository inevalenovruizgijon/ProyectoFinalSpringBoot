<?php
$aspirantes = [];
if (isset($_POST['aspirantes']) && !empty($_POST['aspirantes'])) {
    $aspirantes = unserialize($_POST['aspirantes']);
    if ($aspirantes === false) $aspirantes = [];
}

?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Listado aspirantes</title></head>
<body>
<h2>Listado de aspirantes</h2>
<?php if(empty($aspirantes)): ?>
    <p>No se han introducido aspirantes. <a href="formulariogeneral.php">Volver a formulario</a></p>
<?php else: ?>
<table>
    <tr><th>Nombre</th><th>Edad</th><th>Experiencia</th><th>Correo</th></tr>
    <?php foreach ($aspirantes as $nombre => $info): ?>
    <tr style="color: <?=($info['edad'] > 30 ? 'red' : 'black')?>">
        <td><?= htmlspecialchars($nombre) ?></td>
        <td><?= htmlspecialchars($info['edad']) ?></td>
        <td><?= htmlspecialchars($info['experiencia']) ?></td>
        <td><?= htmlspecialchars($info['correo']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
</body>
</html>