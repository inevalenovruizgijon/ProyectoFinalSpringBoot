<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Frutas Arturo</title>
    <link rel="stylesheet" href="../View/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

    <div class="container">
        <h2><i class="fa-solid fa-gears"></i> Gestión de Inventario</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Detalle</th>
                    <th>Stock</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['productos'] as $producto): ?>
                    <tr class="producto">
                        <td class="id"><?= $producto->getId() ?></td>
                        <td class="nombre"><?= $producto->getNombre() ?></td>
                        <td class="precio"><?= $producto->getPrecio() ?></td>
                        <td class="imagen"><img src="../View/img/<?= $producto->getImagen() ?>" alt=""></td>
                        <td class="descripcion"> <?= $producto->getDetalle() ?></td>
                        <td class="stock"> <?= $producto->getStock() ?></td>
                        <td class="modificar"><a href="../Controller/actualizarProducto.php?id=<?= $producto->getId() ?>" class="btn btn-modificar">Editar</a></td>
                        <td class="eliminar"><a href="../Controller/SeguroEliminar.php?id=<?= $producto->getId() ?>" class="btn btn-borrar">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <form action="../Controller/nuevoProducto.php" enctype="multipart/form-data" method="post">
                        <td>Nuevo</td>
                        <td><input type="text" name="nombre" required></td>
                        <td><input type="number" name="precio" required step="any"></td>
                        <td><input type="file" name="imagen"></td>
                        <td><input type="text" name="detalle"></td>
                        <td><input type="number" name="stock"></td>
                        <td colspan="2"><input type="submit" value="Añadir Producto" name="insert"></td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>

<a href="../Controller/cerrarSesion.php" class="btn-logout">
    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
</a>
</body>

</html>