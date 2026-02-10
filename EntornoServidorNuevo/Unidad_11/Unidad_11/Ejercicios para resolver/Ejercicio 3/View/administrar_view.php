<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Frutas Arturo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #2c3e50;
            padding-left: 15px;
            margin-bottom: 25px;
        }

        img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #eee;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        /* Cabecera */
        thead tr {
            background-color: #2c3e50;
            color: white;
            text-align: left;
        }

        th,
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        /* Filas de datos */
        tbody tr:hover {
            background-color: #f9f9f9;
        }

        /* Inputs de la tabla */
        input[type="text"],
        input[type="tel"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            /* Importante para el ancho */
        }

        input[type="submit"] {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            text-align: center;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn-modificar {
            background-color: #f39c12;
            color: white;
        }

        .btn-modificar:hover {
            background-color: #d35400;
        }

        .btn-borrar {
            background-color: #e74c3c;
            color: white;
        }

        .btn-borrar:hover {
            background-color: #c0392b;
        }

        .acciones {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 180px;
            white-space: nowrap;
        }


        input[name="insert"] {
            background-color: #2ecc71;
            color: white;
            width: 100%;
        }

        input[name="insert"]:hover {
            background-color: #27ae60;
        }

        .info-panel {
            margin-top: 20px;
            padding: 15px;
            background: #ecf0f1;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-back {
            text-decoration: none;
            color: #34495e;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="../Controller/index.php" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Volver a la Tienda</a>
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
                        <td class="eliminar"><a href="../Controller/borraProducto.php?id=<?= $producto->getId() ?>" class="btn btn-borrar">Eliminar</a></td>
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

</body>

</html>