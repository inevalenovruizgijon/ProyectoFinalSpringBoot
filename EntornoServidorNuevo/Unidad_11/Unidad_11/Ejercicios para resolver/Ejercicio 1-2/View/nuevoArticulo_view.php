<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Artículo - Blogs Mendo</title>
    <style>
        /* Importamos la misma fuente */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');

        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
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
            background: linear-gradient(to right, #6366f1, #a855f7);
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

        /* Estilo para los inputs y textarea */
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
            box-sizing: border-box; /* Asegura que el padding no rompa el ancho */
            transition: all 0.3s ease;
            background-color: #fcfcfd;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            background-color: #fff;
        }

        textarea {
            resize: vertical; /* Permite cambiar el tamaño solo hacia abajo */
            min-height: 150px;
        }

        hr {
            border: 0;
            border-top: 1px solid var(--border-color);
            margin: 20px 0;
        }

        /* Botón de envío */
        input[type="submit"] {
            width: 100%;
            background-color: var(--primary);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(99, 102, 241, 0.3);
        }

        input[type="submit"]:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
        }

        /* Enlace para volver */
        .volver {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .volver:hover {
            color: var(--primary);
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Crear nuevo artículo</h2>
        
        <form action="../Controller/grabaArticulo.php" method="POST">
            <h3>Título del artículo</h3>
            <input type="text" name="titulo" placeholder="Escribe un título atractivo..." required>

            <h3>Contenido</h3>
            <textarea name="contenido" placeholder="¿De qué quieres hablar hoy?" required></textarea>
            
            <hr>
            
            <input type="submit" value="Publicar Artículo">
        </form>

        <a href="index.php" class="volver">← Volver al listado</a>
    </div>

</body>

</html>