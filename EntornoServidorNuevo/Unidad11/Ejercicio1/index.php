<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articulos Banco</title>
</head>
<body>
<?php
require_once 'Articulo.php';

if (isset($_POST['eliminar'])) {
    $articulo = new articulo($_POST['id']);
    $articulo->delete();
    echo "<p>articulo eliminado.</p>";
}

if (isset($_POST['editar'])) {
    header("Location: editar.php?id=" . urlencode($_POST['id']));
    exit;
}

if (isset($_POST['anadir'])) {
    $articulo = new Articulo($_POST['id'], $_POST['titulo'], $_POST['fecha'], $_POST['contenido']);
    $articulo->insert();
    echo "<p>Articulo añadido.</p>";
}

$articulos = Articulo::getArticulos();
?>

<table border="1">
    <tr><th>id</th><th>Titulo</th><th>Fecha</th><th>Contenido</th><th>Acciones</th></tr>
    <?php foreach ($articulos as $articulo): ?>
    <tr>
        <td><?= ($articulo->getId()) ?></td>
        <td><?= ($articulo->getTitulo()) ?></td>
        <td><?= ($articulo->getFecha()) ?></td>
        <td><?= ($articulo->getContenido()) ?></td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= ($articulo->getId()) ?>">
                <input type="submit" name="eliminar" value="Eliminar" onclick="return confirm('¿Seguro?')">
            </form>
            <form method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= ($articulo->getId()) ?>">
                <input type="submit" name="editar" value="Editar">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<p>Total: <?= count($articulos) ?> articulos</p>

<form method="post">
    <label>Añadir: id <input name="id" required></label>
    <input name="titulo" required> Titulo
    <input name="fecha" required> Fecha
    <input name="contenido" required> Contenido
    <input type="submit" name="anadir" value="Añadir">
</form>
</body>
</html>