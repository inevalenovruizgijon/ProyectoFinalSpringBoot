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
    die("Artículo no encontrado.");
}

if ($_POST) {
    $desc = $_POST['descripcion'];
    $pcompra = $_POST['pcompra'];
    $pventa = $_POST['pventa'];
    $stock = $_POST['stock'];
    
    $stmt = $conexion->prepare("UPDATE articulos SET descripcion=?, pcompra=?, pventa=?, stock=? WHERE codigo=?");
    $stmt->execute([$desc, $pcompra, $pventa, $stock, $codigo]);
    echo "<p style='color:green;'>¡Artículo modificado! <a href='index.php'>Volver</a></p>";
    exit;
}
?>
<h2>Modificar: <?php echo $art->descripcion; ?> (<?php echo $art->codigo; ?>)</h2>
<form method="post">
    <p>Descripción: <input type="text" name="descripcion" value="<?php echo $art->descripcion; ?>" size="50" required></p>
    <p>Precio Compra: <input type="number" name="pcompra" step="0.01" value="<?php echo $art->pcompra; ?>" required></p>
    <p>Precio Venta: <input type="number" name="pventa" step="0.01" value="<?php echo $art->pventa; ?>" required></p>
    <p>Stock: <input type="number" name="stock" value="<?php echo $art->stock; ?>" min="0" required></p>
    <p>
        <input type="submit" value="Modificar">
        <a href="index.php">Cancelar</a>
    </p>
</form>
<?php $conexion = null; ?>
</body>
</html>