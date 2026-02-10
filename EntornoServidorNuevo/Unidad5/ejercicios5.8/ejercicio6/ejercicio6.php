<?php

$curriculums = [];
if (isset($_POST['curriculums']) && !empty($_POST['curriculums'])) {
    $curriculums = unserialize($_POST['curriculums']);
    if ($curriculums === false) $curriculums = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Página principal CVs</title></head>
<body>

<h2>Nuevo Curriculum</h2>
<form method="post" action="pagina2.php">
    <label>DNI: <input type="text" name="dni" required pattern="[0-9A-Za-z]+"></label>
    <input type="hidden" name="curriculums" value="<?=htmlspecialchars(serialize($curriculums))?>">
    <button type="submit" name="nuevo_cv">Nuevo CV</button>
</form>

<form method="post" action="pagina3.php">
    <input type="hidden" name="curriculums" value="<?=htmlspecialchars(serialize($curriculums))?>">
    <button type="submit" name="listar">Listar curriculums</button>
</form>

</body>
</html>