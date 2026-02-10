<?php
$curriculums = [];
if (isset($_POST['curriculums']) && !empty($_POST['curriculums'])) {
    $curriculums = unserialize($_POST['curriculums']);
    if ($curriculums === false) $curriculums = [];
}
$dni = isset($_POST['dni']) ? $_POST['dni'] : null;
if ($dni === null || !isset($curriculums[$dni])) {
    header("Location: pagina2.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Curriculum <?=htmlspecialchars($dni)?></title></head>
<body>
<h2>Curriculum <?=htmlspecialchars($dni)?></h2>
<table>
    <tr><th>Título</th><th>Valor</th></tr>
    <?php foreach($curriculums[$dni] as $titulo => $valor): ?>
    <tr>
        <td><?=htmlspecialchars($titulo)?></td>
        <td><?=htmlspecialchars($valor)?></td>
    </tr>
    <?php endforeach; ?>
</table>

<form method="post" action="pagina2.php">
    <input type="hidden" name="curriculums" value="<?=htmlspecialchars(serialize($curriculums))?>">
    <button type="submit">Volver al listado</button>
</form>

</body>
</html>