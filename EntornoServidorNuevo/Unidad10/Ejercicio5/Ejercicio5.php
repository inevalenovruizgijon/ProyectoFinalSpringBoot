<?php
session_start();
$conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");

if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = [];
}

if (isset($_POST['alta'])) {
    $codigo = $_POST['codigo'];
    $check = $conexion->prepare("SELECT COUNT(*) FROM articulos WHERE codigo=?");
    $check->execute([$codigo]);
    if ($check->fetchColumn() > 0) {
        echo "<p style='color:red;'>Código $codigo ya existe.</p>";
    } else {
        $stmt = $conexion->prepare("INSERT INTO articulos (codigo, descripcion, pcompra, pventa, stock) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$_POST['codigo'], $_POST['descripcion'], $_POST['pcompra'], $_POST['pventa'], $_POST['stock']]);
        echo "<p style='color:green;'>Artículo dado de alta.</p>";
    }
}

if (isset($_POST['baja'])) {
    $codigo = $_POST['codigo'];
    $check = $conexion->prepare("SELECT COUNT(*) FROM articulos WHERE codigo=?");
    $check->execute([$codigo]);
    if ($check->fetchColumn() == 0) {
        echo "<p style='color:red;'>Código $codigo no existe.</p>";
    } else {
        $stmt = $conexion->prepare("DELETE FROM articulos WHERE codigo=?");
        $stmt->execute([$codigo]);
        echo "<p style='color:red;'>Artículo borrado.</p>";
    }
}

if (isset($_POST['comprar'])) {
    $codigo = $_POST['codigo'];
    $cantidad = (int)$_POST['cantidad'];
    if ($cantidad > 0) {
        $_SESSION['cesta'][$codigo] = ($_SESSION['cesta'][$codigo] ?? 0) + $cantidad;
        echo "<p style='color:green;'>+ $cantidad de $codigo a carrito.</p>";
    }
}

if (isset($_POST['procesar'])) {
    $factura_num = date('YmdHis');
    $factura_file = "factura_$factura_num.txt";
    $total = 0;
    $iva = 1.21;
    
    $fp = fopen($factura_file, 'w');
    fwrite($fp, "FACTURA GESTISIMAL #$factura_num\n");
    fwrite($fp, "Fecha: " . date('d/m/Y H:i') . "\n\n");
    fwrite($fp, "CÓDIGO\tDESCRIPCIÓN\tCANT\tPRECIO\tSUBTOTAL\n");
    
    foreach ($_SESSION['cesta'] as $codigo => $cant) {
        $stmt = $conexion->prepare("SELECT * FROM articulos WHERE codigo=?");
        $stmt->execute([$codigo]);
        $art = $stmt->fetch(PDO::FETCH_OBJ);
        
        if ($art) {
            $subtotal = $cant * $art->pventa;
            $total += $subtotal;
            fwrite($fp, "{$art->codigo}\t{$art->descripcion}\t$cant\t{$art->pventa}€\t" . number_format($subtotal, 2) . "€\n");
            
            $nuevo_stock = max(0, $art->stock - $cant);
            $update = $conexion->prepare("UPDATE articulos SET stock=? WHERE codigo=?");
            $update->execute([$nuevo_stock, $codigo]);
        }
    }
    
    $total_iva = $total * $iva;
    fwrite($fp, "\nTOTAL: " . number_format($total, 2) . "€\n");
    fwrite($fp, "TOTAL + 21% IVA: " . number_format($total_iva, 2) . "€\n");
    fclose($fp);
    
    $_SESSION['cesta'] = []; 
    echo "<p style='color:green;'>Pedido procesado. <a href='$factura_file'>Ver Factura #$factura_num</a></p>";
}

$articulos = $conexion->query("SELECT * FROM articulos ORDER BY codigo")->fetchAll(PDO::FETCH_OBJ);
?>

<h1>GESTISIMAL - Ejercicio 5</h1>

<h2>Listado Artículos (Carrito: <?= count($_SESSION['cesta']) ?> ítems)</h2>
<table border="1">
    <tr><th>Código</th><th>Descripción</th><th>PCompra</th><th>PVenta</th><th>Stock</th><th>Carrito</th></tr>
    <?php foreach ($articulos as $art): ?>
    <tr>
        <td><?php echo $art->codigo; ?></td>
        <td><?php echo $art->descripcion; ?></td>
        <td><?php echo $art->pcompra; ?></td>
        <td><?php echo $art->pventa; ?></td>
        <td><?php echo $art->stock; ?></td>
        <td>
            <?php echo $_SESSION['cesta'][$art->codigo] ?? 0; ?> |
            <form method="post">
                <input type="hidden" name="codigo" value="<?php echo $art->codigo; ?>">
                <input type="number" name="cantidad" value="1" min="1" max="<?php echo $art->stock; ?>" size="2">
                <input type="submit" name="comprar" value="Comprar">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<form method="post">
    <input type="submit" name="procesar" value="PROCESAR PEDIDO Y GENERAR FACTURA" onclick="return confirm('¿Procesar? Stock se actualizará.');">
</form>

<h2>Operaciones</h2>
<h3>Dar Alta</h3>
<form method="post">
    Código: <input type="text" name="codigo" maxlength="10" required><br>
    Descripción: <input type="text" name="descripcion" size="40" required><br>
    PCompra: <input type="number" name="pcompra" step="0.01" required><br>
    PVenta: <input type="number" name="pventa" step="0.01" required><br>
    Stock: <input type="number" name="stock" value="0" min="0"><br>
    <input type="submit" name="alta" value="Alta">
</form>

<h3>Baja</h3>
<form method="post">
    Código: <input type="text" name="codigo" maxlength="10" required>
    <input type="submit" name="baja" value="Borrar">
</form>

<?php $conexion = null; ?>
</body>
</html>
