<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Banco</title>
</head>
<body>
<?php
require_once 'Cliente.php';

if (isset($_POST['eliminar'])) {
    $cliente = new Cliente($_POST['dni']);
    $cliente->delete();
    echo "<p>Cliente eliminado.</p>";
}

if (isset($_POST['editar'])) {
    header("Location: editar.php?dni=" . urlencode($_POST['dni']));
    exit;
}

if (isset($_POST['anadir'])) {
    $cliente = new Cliente($_POST['dni'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono']);
    $cliente->insert();
    echo "<p>Cliente añadido.</p>";
}

$clientes = Cliente::getClientes();
?>

<table border="1">
    <tr><th>DNI</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Acciones</th></tr>
    <?php foreach ($clientes as $cliente): ?>
    <tr>
        <td><?= ($cliente->getDni()) ?></td>
        <td><?= ($cliente->getNombre()) ?></td>
        <td><?= ($cliente->getDireccion()) ?></td>
        <td><?= ($cliente->getTelefono()) ?></td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="dni" value="<?= ($cliente->getDni()) ?>">
                <input type="submit" name="eliminar" value="Eliminar" onclick="return confirm('¿Seguro?')">
            </form>
            <form method="post" style="display:inline;">
                <input type="hidden" name="dni" value="<?= ($cliente->getDni()) ?>">
                <input type="submit" name="editar" value="Editar">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<p>Total: <?= count($clientes) ?> clientes</p>

<form method="post">
    <label>Añadir: DNI <input name="dni" required></label>
    <input name="nombre" required> Nombre
    <input name="direccion" required> Dirección
    <input name="telefono" required> Teléfono
    <input type="submit" name="anadir" value="Añadir">
</form>
</body>
</html>