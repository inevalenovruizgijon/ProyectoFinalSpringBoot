<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de artículos - Blogs Mendo</title>
    <style>
/* Importamos una fuente moderna de Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');

:root {
    --primary: #6366f1; /* Índigo moderno */
    --primary-hover: #4f46e5;
    --danger: #ef4444;
    --warning: #f59e0b;
    --bg-body: #f8fafc;
    --text-main: #1e293b;
    --text-muted: #64748b;
    --card-bg: #ffffff;
}

body {
    font-family: 'Inter', sans-serif;
    background-color: var(--bg-body);
    color: var(--text-main);
    margin: 0;
    padding: 40px 20px;
}

.container {
    max-width: 900px;
    margin: 0 auto;
}

/* Encabezado Principal */
h1 {
    font-size: 2.5rem;
    font-weight: 800;
    text-align: center;
    background: linear-gradient(to right, #6366f1, #a855f7);
    -webkit-text-fill-color: transparent;
    margin-bottom: 40px;
}

/* Botón Crear con estilo flotante */
.btn-nuevo {
    display: inline-flex;
    align-items: center;
    background-color: var(--primary);
    color: white;
    padding: 12px 24px;
    text-decoration: none;
    border-radius: 12px;
    font-weight: 600;
    box-shadow: 0 4px 14px rgba(99, 102, 241, 0.4);
    transition: all 0.3s ease;
    margin-bottom: 40px;
}

.btn-nuevo:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.6);
    background-color: var(--primary-hover);
}

/* Tarjetas de Artículo */
.articulo {
    background: var(--card-bg);
    padding: 30px;
    margin-bottom: 25px;
    border-radius: 20px;
    border: 1px solid #e2e8f0;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.articulo:hover {
    transform: scale(1.01);
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
}

.articulo h3 {
    margin: 0 0 10px 0;
    font-size: 1.5rem;
    color: var(--text-main);
}

.fecha {
    color: var(--text-muted);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-weight: 600;
}

.contenido {
    margin: 20px 0;
    color: #475569;
    font-size: 1.05rem;
    line-height: 1.7;
}

/* Contenedor de botones de acción */
.acciones {
    display: flex;
    justify-content: flex-end;
    gap: 15px;
    border-top: 1px solid #f1f5f9;
    padding-top: 20px;
}

.btn {
    padding: 8px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.2s;
}

.btn-borrar {
    color: var(--danger);
    background: #fef2f2;
}

.btn-borrar:hover {
    background: var(--danger);
    color: white;
}

.btn-modificar {
    color: var(--primary);
    background: #eef2ff;
}

.btn-modificar:hover {
    background: var(--primary);
    color: white;
}

    </style>
</head>

<body>
<div class="container">
    <h1>Blogs Mendo</h1>
    <a href="../Controller/nuevoArticulo.php" class="btn-nuevo">Escribir Artículo</a>

    <?php foreach ($data['articulos'] as $articulo): ?>
        <article class="articulo">
            <span class="fecha"><?= $articulo->getFecha_pub() ?></span>
            <h3><?= $articulo->getTitulo() ?></h3>
            
            <div class="contenido">
                <?= nl2br($articulo->getContenido()) ?>
            </div>

            <div class="acciones">
                <a href="../Controller/actualizarArticulo.php?id=<?= $articulo->getId() ?>" class="btn btn-modificar">Editar</a>
                <a href="../Controller/borraArticulo.php?id=<?= $articulo->getId() ?>" class="btn btn-borrar">Eliminar</a>
            </div>
        </article>
    <?php endforeach; ?>
</div>
</body>

</html>