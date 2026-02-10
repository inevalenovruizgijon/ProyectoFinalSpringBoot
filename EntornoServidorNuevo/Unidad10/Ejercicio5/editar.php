<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Artículo</title>
</head>
<body>
<?php
$codigo = $_GET['codigo'] ?? '';
$conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");

$stmt = $conexion->prepare("SELECT * FROM articulos WHERE codigo=?");
$stmt->execute([$codigo]);
$art = $stmt->fetch(PDO::FETCH_OBJ);

if (!$art) {
    die("Artículo no existe.");
}

if ($_POST) {
    $nuevo_codigo = $_POST['codigo'];
    
    if ($nuevo_codigo != $codigo) {
        $check = $conexion->prepare("SELECT COUNT(*) FROM articulos WHERE codigo=?");
        $check->execute([$nuevo_codigo]);
        if ($check->fetchColumn() > 0) {
            die("Código $nuevo_codigo ya existe.");
        }
    }
    
    $stmt = $conexion->prepare("UPDATE articulos SET codigo=?, descripcion=?, pcompra=?, pventa=?, stock=? WHERE codigo=?");
    $stmt->execute([$_POST['codigo'], $_POST['descripcion'], $_POST['pcompra'], $_POST['pventa'], $_POST['stock'], $codigo]);
    echo "<p style='color:green;'>Modificado. <a href='index.php'>Listado</a></p>";
    exit;
}
?>
<h2>Modificar <?php echo $art->descripcion; ?></h2>
<form method="post">
    Código: <input type="text" name="codigo" value="<?php echo $art->codigo; ?>" maxlength="10" required><br>
    Descripción: <input type="text" name="descripcion" value="<?php echo $art->descripcion; ?>" size="50" required><br>
    PCompra: <input type="number" name="pcompra" step="0.01" value="<?php echo $art->pcompra; ?>" required><br>
    PVenta: <input type="number" name="pventa" step="0.01" value="<?php echo $art->pventa; ?>" required><br>
    Stock: <input type="number" name="stock" value="<?php echo $art->stock; ?>" min="0" required><br>
    <input type="submit" value="Modificar">
    <a href="index.php">Cancelar</a>
</form>
<?php $conexion = null; ?>
</body>
</html>
