<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GESTISIMAL - Gestión de Almacén</title>
</head>
<body>
<?php
$conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");

if (isset($_POST['alta'])) {
    $codigo = $_POST['codigo'];
    $desc = $_POST['descripcion'];
    $pcompra = $_POST['pcompra'];
    $pventa = $_POST['pventa'];
    $stock = $_POST['stock'];
    
    $check = $conexion->prepare("SELECT COUNT(*) FROM articulos WHERE codigo=?");
    $check->execute([$codigo]);
    if ($check->fetchColumn() > 0) {
        echo "<p style='color:red;'>Código $codigo ya existe.</p>";
    } else {
        $stmt = $conexion->prepare("INSERT INTO articulos (codigo, descripcion, pcompra, pventa, stock) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$codigo, $desc, $pcompra, $pventa, $stock]);
        echo "<p style='color:green;'>Artículo $codigo dado de alta.</p>";
    }
}

if (isset($_POST['baja'])) {
    $codigo = $_POST['codigo'];
    $stmt = $conexion->prepare("DELETE FROM articulos WHERE codigo=?");
    $stmt->execute([$codigo]);
    echo "<p style='color:red;'>Artículo $codigo borrado.</p>";
}

if (isset($_POST['entrada'])) {
    $codigo = $_POST['codigo'];
    $unidades = (int)$_POST['unidades'];
    $stmt = $conexion->prepare("UPDATE articulos SET stock = stock + ? WHERE codigo=?");
    $stmt->execute([$unidades, $codigo]);
    echo "<p style='color:green;'>+ $unidades unidades a $codigo.</p>";
}

if (isset($_POST['salida'])) {
    $codigo = $_POST['codigo'];
    $unidades = (int)$_POST['unidades'];
    $stock_actual = $conexion->prepare("SELECT stock FROM articulos WHERE codigo=?");
    $stock_actual->execute([$codigo]);
    $stock = $stock_actual->fetchColumn();
    
    if ($unidades > $stock) {
        echo "<p style='color:red;'>No hay stock suficiente. Disponible: $stock</p>";
    } else {
        $stmt = $conexion->prepare("UPDATE articulos SET stock = stock - ? WHERE codigo=?");
        $stmt->execute([$unidades, $codigo]);
        echo "<p style='color:green;'>- $unidades unidades de $codigo.</p>";
    }
}

$articulos = $conexion->query("SELECT * FROM articulos ORDER BY codigo")->fetchAll(PDO::FETCH_OBJ);
?>

<h1>GESTISIMAL - Gestión Simplificada de Almacén</h1>

<h2>Listado de Artículos</h2>
<table border="1">
    <tr>
        <th>Código</th>
        <th>Descripción</th>
        <th>Precio Compra</th>
        <th>Precio Venta</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($articulos as $art): ?>
    <tr>
        <td><?php echo $art->codigo; ?></td>
        <td><?php echo $art->descripcion; ?></td>
        <td><?php echo $art->pcompra; ?> €</td>
        <td><?php echo $art->pventa; ?> €</td>
        <td><?php echo $art->stock; ?></td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="codigo" value="<?php echo $art->codigo; ?>">
                <input type="submit" name="baja" value="Borrar" onclick="return confirm('¿Borrar <?php echo $art->descripcion; ?>?')">
            </form>
            <a href="editar.php?codigo=<?php echo $art->codigo; ?>">Modificar</a>
            |
            <form method="post" style="display:inline;">
                <input type="hidden" name="codigo" value="<?php echo $art->codigo; ?>">
                Entrada: <input type="number" name="unidades" value="1" min="1" size="3">
                <input type="submit" name="entrada" value="Entrar">
            </form>
            |
            <form method="post" style="display:inline;">
                <input type="hidden" name="codigo" value="<?php echo $art->codigo; ?>">
                Salida: <input type="number" name="unidades" value="1" min="1" size="3">
                <input type="submit" name="salida" value="Sacar">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Dar de Alta Nuevo Artículo</h2>
<form method="post">
    <p>Código: <input type="text" name="codigo" maxlength="10" required></p>
    <p>Descripción: <input type="text" name="descripcion" size="50" required></p>
    <p>Precio Compra: <input type="number" name="pcompra" step="0.01" required></p>
    <p>Precio Venta: <input type="number" name="pventa" step="0.01" required></p>
    <p>Stock Inicial: <input type="number" name="stock" value="0" min="0"></p>
    <p><input type="submit" name="alta" value="Dar de Alta"></p>
</form>

<?php $conexion = null; ?>
</body>
</html>