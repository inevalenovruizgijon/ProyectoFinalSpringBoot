<?php
$curriculums = [];
if (isset($_POST['curriculums']) && !empty($_POST['curriculums'])) {
    $curriculums = unserialize($_POST['curriculums']);
    if ($curriculums === false) $curriculums = [];
}
$dni = isset($_POST['dni']) ? $_POST['dni'] : null;
if ($dni === null) {
    header("Location: ejercicio6.php");
    exit;
}

if (isset($_POST['agregar'])) {
    $titulo = trim($_POST['titulo']);
    $valor = trim($_POST['valor']);
    if ($titulo !== '') {
        if (!isset($curriculums[$dni])) {
            $curriculums[$dni] = [];
        }
        $curriculums[$dni][$titulo] = $valor;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Nuevo CV <?=htmlspecialchars($dni)?></title></head>
<body>

<h2>Agregar datos CV <?=htmlspecialchars($dni)?></h2>
<form method="post">
    <label>Título: <input type="text" name="titulo" required></label><br>
    <label>Valor: <input type="text" name="valor"></label><br>
    <input type="hidden" name="dni" value="<?=htmlspecialchars($dni)?>">
    <input type="hidden" name="curriculums" value="<?=htmlspecialchars(serialize($curriculums))?>">
    <button type="submit" name="agregar">Agregar dato</button>
</form>

<form method="post" action="ejercicio6.php">
    <input type="hidden" name="curriculums" value="<?=htmlspecialchars(serialize($curriculums))?>">
    <button type="submit" name="finalizar">Finalizar</button>
</form>

</body>
</html>