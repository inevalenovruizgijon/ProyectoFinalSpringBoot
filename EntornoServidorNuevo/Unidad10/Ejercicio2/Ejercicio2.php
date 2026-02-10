
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Banco - Paginado</title>
</head>
<body>
<?php
$conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");

$por_pagina = 5;
$pagina = $_GET['pagina'] ?? 1;
$offset = ($pagina - 1) * $por_pagina;

if (isset($_POST['eliminar'])) {
    $dni = $_POST['dni'];
    $stmt = $conexion->prepare("DELETE FROM cliente WHERE DNI = ?");
    $stmt->execute([$dni]);
    echo "<p style='color:red;'>Cliente $dni eliminado.</p>";
}

if (isset($_POST['anadir'])) {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    
    $check = $conexion->prepare("SELECT COUNT(*) FROM cliente WHERE DNI = ?");
    $check->execute([$dni]);
    if ($check->fetchColumn() > 0) {
        echo "<p style='color:red;'>❌ DNI $dni ya existe. Elige otro.</p>";
    } else {
        $stmt = $conexion->prepare("INSERT INTO cliente (DNI, Nombre, Dirección, Teléfono) VALUES (?, ?, ?, ?)");
        $stmt->execute([$dni, $nombre, $direccion, $telefono]);
        echo "<p style='color:green;'>✅ Cliente $dni añadido.</p>";
    }
}

$count = $conexion->query("SELECT COUNT(*) FROM cliente")->fetchColumn();
$total_paginas = ceil($count / $por_pagina);
$consulta = $conexion->prepare("SELECT DNI, Nombre, Dirección, Teléfono FROM cliente LIMIT ? OFFSET ?");
$consulta->bindValue(1, $por_pagina, PDO::PARAM_INT);
$consulta->bindValue(2, $offset, PDO::PARAM_INT);
$consulta->execute();
?>

<h2>Clientes Banco (Página <?= $pagina ?> de <?= $total_paginas ?> - Total: <?= $count ?>)</h2>

<table border="1">
    <tr><th>DNI</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Acciones</th></tr>
    <?php while ($cliente = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
    <tr>
        <td><?= $cliente->DNI ?></td>
        <td><?= $cliente->Nombre ?></td>
        <td><?= $cliente->Dirección ?></td>
        <td><?= $cliente->Teléfono ?></td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="dni" value="<?= $cliente->DNI ?>">
                <input type="submit" name="eliminar" value="Eliminar" 
                       onclick="return confirm('¿Borrar <?= $cliente->Nombre ?> (<?= $cliente->DNI ?>)?')">
            </form>
            <a href="editar.php?dni=<?= urlencode($cliente->DNI) ?>">Editar</a>
        </td>
    </tr>
    <?php } ?>
</table>

<div>
<?php if ($pagina > 1): ?>
    <a href="?pagina=<?= $pagina-1 ?>">« Anterior</a>
<?php endif; ?>

<?php for ($i=1; $i<=$total_paginas; $i++): ?>
    <a href="?pagina=<?= $i ?>" <?= $i==$pagina ? 'style="font-weight:bold;"' : '' ?>><?= $i ?></a>
<?php endfor; ?>

<?php if ($pagina < $total_paginas): ?>
    <a href="?pagina=<?= $pagina+1 ?>">Siguiente »</a>
<?php endif; ?>
</div>

<h3>Añadir Cliente</h3>
<form method="post">
    <p>DNI: <input type="text" name="dni" maxlength="9" required></p>
    <p>Nombre: <input type="text" name="nombre" required></p>
    <p>Dirección: <input type="text" name="direccion" required></p>
    <p>Teléfono: <input type="text" name="telefono" required></p>
    <p><input type="submit" name="anadir" value="Añadir"></p>
</form>

<?php $conexion = null; ?>
</body>
</html>
