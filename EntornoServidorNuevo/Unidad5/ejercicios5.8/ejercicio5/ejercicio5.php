<?php
$aspirantes = [];
if (isset($_POST['aspirantes']) && !empty($_POST['aspirantes'])) {
    $aspirantes = unserialize($_POST['aspirantes']);
    if ($aspirantes === false) $aspirantes = [];
}

if (isset($_POST['agregar'])) {
    $nombre = trim($_POST['nombre']);
    $edad = (int)$_POST['edad'];
    $experiencia = (int)$_POST['experiencia'];
    $correo = trim($_POST['correo']);
    
    if ($nombre !== '') {
        $aspirantes[$nombre] = [
            'edad' => $edad,
            'experiencia' => $experiencia,
            'correo' => $correo
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Aspirantes</title></head>
<body>
<h2>Introducir aspirantes</h2>
<form method="post" action="">
    <label>Nombre: <input type="text" name="nombre" required></label><br>
    <label>Edad: <input type="number" name="edad" required min="0"></label><br>
    <label>Años de experiencia: <input type="number" name="experiencia" required min="0"></label><br>
    <label>Correo: <input type="email" name="correo" required></label><br>
    <input type="hidden" name="aspirantes" value="<?= htmlspecialchars(serialize($aspirantes)) ?>">
    <button type="submit" name="agregar">Agregar aspirante</button>
</form>
<form method="post" action="listado.php">
    <input type="hidden" name="aspirantes" value="<?= htmlspecialchars(serialize($aspirantes)) ?>">
    <button type="submit" name="finalizar">Finalizar</button>
</form>
</body>
</html>