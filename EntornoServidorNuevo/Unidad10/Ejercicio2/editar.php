<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
<?php
$dni_original = $_GET['dni'] ?? '';
$conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");

$stmt = $conexion->prepare("SELECT * FROM cliente WHERE DNI = ?");
$stmt->execute([$dni_original]);
$cliente = $stmt->fetch(PDO::FETCH_OBJ);

if (!$cliente) {
    die("Cliente no encontrado.");
}

if ($_POST && isset($_POST['guardar'])) {
    $set = [];
    $params = [];
    
    if (!empty($_POST['nombre'])) { $set[] = "Nombre=?"; $params[] = $_POST['nombre']; }
    if (!empty($_POST['direccion'])) { $set[] = "Dirección=?"; $params[] = $_POST['direccion']; }
    if (!empty($_POST['telefono'])) { $set[] = "Teléfono=?"; $params[] = $_POST['telefono']; }
    
    if (empty($set)) {
        echo "<p style='color:orange;'>No cambiaste nada.</p>";
    } else {
        $set_sql = implode(', ', $set);
        $sql = "UPDATE cliente SET $set_sql WHERE DNI = ?";
        $params[] = $dni_original;
        
        $stmt = $conexion->prepare($sql);
        $stmt->execute($params);
        echo "<p style='color:green;'>¡Actualizado! <a href='index.php'>Lista</a></p>";
        exit;
    }
}
?>
<h2>Editar <?= $cliente->Nombre ?> (<?= $cliente->DNI ?>)</h2>
<form method="post">
    <p><b>DNI:</b> <?= $cliente->DNI ?> (no editable)</p>
    
    <p>
        <label><input type="checkbox" name="cambiar_nombre" checked> Nombre:</label><br>
        <input type="text" name="nombre" value="<?= $cliente->Nombre ?>" size="40">
    </p>
    
    <p>
        <label><input type="checkbox" name="cambiar_direccion" checked> Dirección:</label><br>
        <input type="text" name="direccion" value="<?= $cliente->Dirección ?>" size="40">
    </p>
    
    <p>
        <label><input type="checkbox" name="cambiar_telefono" checked> Teléfono:</label><br>
        <input type="text" name="telefono" value="<?= $cliente->Teléfono ?>">
    </p>
    
    <p>
        <input type="submit" name="guardar" value="Guardar Cambios">
        <a href="index.php">Cancelar</a>
    </p>
</form>
<?php $conexion = null; ?>
