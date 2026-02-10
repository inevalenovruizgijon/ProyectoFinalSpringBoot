<?php
$curriculums = [];
if (isset($_POST['curriculums']) && !empty($_POST['curriculums'])) {
    $curriculums = unserialize($_POST['curriculums']);
    if ($curriculums === false) $curriculums = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Listado de Curriculums</title></head>
<body>

<h2>Listado de Curriculums</h2>

<?php if (empty($curriculums)): ?>
<p>No hay curriculums registrados. <a href="index.php">Volver</a></p>
<?php else: ?>
<ul>
    <?php foreach($curriculums as $dni => $datos): ?>
    <li>
        <form method="post" action="pagina4.php" >
            <input type="hidden" name="curriculums" value="<?=htmlspecialchars(serialize($curriculums))?>">
            <input type="hidden" name="dni" value="<?=htmlspecialchars($dni)?>">
            <button type="submit" >
                <?=htmlspecialchars($dni)?>
            </button>
        </form>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<form method="post" action="ejercicio6.php">
    <input type="hidden" name="curriculums" value="<?=htmlspecialchars(serialize($curriculums))?>">
    <button type="submit">Volver</button>
</form>

</body>
</html>