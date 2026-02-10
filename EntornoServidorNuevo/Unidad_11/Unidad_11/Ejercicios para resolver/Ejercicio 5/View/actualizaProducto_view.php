<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar producto</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fdfdfd;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 2px solid #f0ad4e;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #666;
            font-size: 0.9em;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1em;
        }

        input[readonly] {
            background-color: #f9f9f9;
            color: #888;
            cursor: not-allowed;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        input[type="submit"] {
            flex: 2;
            background-color: #f0ad4e;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #ec971f;
        }

        .btn-back {
            flex: 1;
            text-decoration: none;
            background-color: #eee;
            color: #333;
            padding: 12px;
            border-radius: 4px;
            text-align: center;
            font-size: 0.9em;
            font-weight: bold;
        }

        .btn-back:hover {
            background-color: #ddd;
        }

        img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #eee;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Modificar producto</h2>

        <form action="../Controller/updateProducto.php" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label>ID (No editable)</label>
                <input type="text" name="id" value="<?= $data['producto']->getId() ?>" readonly>
            </div>

            <div class="form-group">
                <label>Nombre Completo</label>
                <input type="text" name="nombre" value="<?= $data['producto']->getNombre() ?>" required>
            </div>

            <div class="form-group">
                <label>Precio</label>
                <input type="number" name="precio" value="<?= $data['producto']->getPrecio() ?>" step="any">
            </div>

            <div class="form-group">
                <label>Imagen</label>
                <img src="../View/img/<?= $data['producto']->getImagen()?>" alt="">
                <input type="file" name="imagen">
                <input type="hidden" name="imagenVieja" value="<?= $data['producto']->getImagen() ?>">
            </div>

            <div class="form-group">
                <label>Detalles</label>
                <input type="text" name="detalle" value="<?= $data['producto']->getDetalle() ?>">
            </div>

            <div class="form-group">
                <label>Stock</label>
                <input type="number" name="stock" value="<?= $data['producto']->getStock() ?>">
            </div>

            <div class="buttons">
                <a href="../Controller/admin.php" class="btn-back">Cancelar</a>
                <input type="submit" value="Guardar Cambios" name="mod">
            </div>
        </form>
    </div>

</body>

</html>