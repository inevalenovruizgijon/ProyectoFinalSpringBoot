<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Artículo - Blogs Mendo</title>
    <style>
        /* Importamos la misma fuente para mantener consistencia */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');

        :root {
            --primary-edit: #f59e0b; /* Color ámbar para edición */
            --primary-edit-hover: #d97706;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --card-bg: #ffffff;
            --border-color: #e2e8f0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .form-container {
            background: var(--card-bg);
            width: 100%;
            max-width: 600px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
        }

        h2 {
            margin-top: 0;
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(to right, #f59e0b, #ea580c);
            -webkit-text-fill-color: transparent;
            margin-bottom: 30px;
            text-align: center;
        }

        h3 {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            margin-bottom: 8px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px 16px;
            margin-bottom: 25px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-family: inherit;
            font-size: 1rem;
            color: var(--text-main);
            box-sizing: border-box;
            transition: all 0.3s ease;
            background-color: #fffaf5; /* Un tono muy levemente cálido */
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary-edit);
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
            background-color: #fff;
        }

        textarea {
            resize: vertical;
            min-height: 200px;
        }

        hr {
            border: 0;
            border-top: 1px solid var(--border-color);
            margin: 20px 0;
        }

        /* Botón de actualizar */
        input[type="submit"] {
            width: 100%;
            background-color: var(--primary-edit);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(245, 158, 11, 0.3);
        }

        input[type="submit"]:hover {
            background-color: var(--primary-edit-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .volver:hover {
            color: var(--primary-edit);
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Modificar Artículo</h2>
        
        <form action="../Controller/updateArticulo.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['articulo']->getId() ?>"> 

            <h3>Título</h3>
            <input type="text" name="titulo" value="<?= htmlspecialchars($data['articulo']->getTitulo()) ?>" required>

            <h3>Contenido</h3>
            <textarea name="contenido" required><?= htmlspecialchars($data['articulo']->getContenido()) ?></textarea>
            
            <hr>
            
            <input type="submit" value="Guardar Cambios">
        </form>

        <a href="index.php" class="volver">← Cancelar y volver</a>
    </div>

</body>

</html>