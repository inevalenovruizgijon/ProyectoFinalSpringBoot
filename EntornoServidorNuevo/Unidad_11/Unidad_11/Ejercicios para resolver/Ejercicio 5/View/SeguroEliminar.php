<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: white;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            max-width: 420px;
            text-align: center;
        }

        .icon {
            font-size: 60px;
            margin-bottom: 1rem;
            display: block;
        }

        h2 {
            margin: 0 0 15px 0;
            color: #2d3436;
            font-size: 1.5rem;
        }

        p {
            color: #636e72;
            line-height: 1.6;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .button-group {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        /* Estilo base para los enlaces convertidos en botones */
        .btn {
            text-decoration: none; /* Quita el subrayado */
            display: inline-block; /* Permite aplicar padding y anchos */
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        /* Efecto de pulsación al hacer clic */
        .btn:active {
            transform: scale(0.96);
        }

        /* Botón Cancelar */
        .btn-cancel {
            background-color: #f1f2f6;
            color: #2d3436;
        }

        .btn-cancel:hover {
            background-color: #dfe4ea;
            color: #000;
        }

        /* Botón Eliminar */
        .btn-delete {
            background-color: #ff4757;
            color: white;
        }

        .btn-delete:hover {
            background-color: #ff6b81;
            box-shadow: 0 4px 12px rgba(255, 71, 87, 0.3);
        }
    </style>
</head>
<body>

    <div class="card">
        <span class="icon">🗑️</span>
        <h2>¿Eliminar producto?</h2>
        <p>Estás intentando borrar <strong> <?= $data['producto']->getNombre() ?></strong>.<br>Esta acción es permanente y no se puede deshacer.</p>
        
        <div class="button-group">
            <a href="../Controller/admin.php" class="btn btn-cancel">Cancelar</a>
            <a href="../Controller/borraProducto.php?id=<?=$_GET['id']?>" class="btn btn-delete">Eliminar Producto</a>
        </div>
    </div>

</body>
</html>