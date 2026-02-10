<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Academia - API</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00703c; /* Verde corporativo */
            --primary-hover: #005a30;
            --secondary: #f07d00; /* Naranja acento */
            --danger: #e74c3c;
            --bg: #f4f7f6;
            --card-bg: #ffffff;
            --text: #333;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: var(--primary);
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
        }

        /* Contenedor en Grid para que los formularios se vean ordenados */
        .contenedor {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 1100px;
        }

        /* Estilo de cada tarjeta de formulario */
        .card-form {
            background: var(--card-bg);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            transition: transform 0.2s;
        }

        .card-form:hover {
            transform: translateY(-5px);
        }

        .card-form h2 {
            font-size: 1.1rem;
            margin-top: 0;
            color: var(--primary);
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        /* Elementos del formulario */
        label {
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"], 
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 112, 60, 0.1);
        }

        /* Botones personalizados */
        input[type="submit"] {
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            color: white;
            background-color: var(--primary);
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background-color: var(--primary-hover);
        }

        /* Botón de borrar en color rojo */
        .btn-danger {
            background-color: var(--danger) !important;
        }

        .btn-danger:hover {
            background-color: #c0392b !important;
        }

        /* Botón de acción especial en naranja */
        .btn-accent {
            background-color: var(--secondary) !important;
        }

        .btn-accent:hover {
            background-color: #d67000 !important;
        }

        hr { display: none; } /* Ocultamos los HR porque usamos tarjetas */

    </style>
</head>
<body>

    <h1>Panel de Gestión Académica</h1>

    <div class="contenedor">

        <div class="card-form">
            <h2> Filtro por Curso</h2>
            <form action="../Service/peticion.php" method="post">
                <label>Nombre del Curso</label>
                <input type="text" name="curso" placeholder="Ej: 2º DAW">
                <input type="submit" name="filtraCurso" value="Filtrar">
            </form>
        </div>

        <div class="card-form">
            <h2> Filtro por Nombre</h2>
            <form action="../Service/peticion.php" method="post">
                <label>Nombre Alumno</label>
                <input type="text" name="nombre" placeholder="Ej: Pepe">
                <input type="submit" name="filtraNombre" value="Filtrar">
            </form>
        </div>

        <div class="card-form">
            <h2> Detalle de Alumno</h2>
            <form action="../Service/peticion.php" method="post">
                <label>Nombre Alumno</label>
                <input type="text" name="nombreAlumno" placeholder="Ej: Juan">
                <input type="submit" name="filtraAlumno" value="Ver Ficha">
            </form>
        </div>

        <div class="card-form">
            <h2> Matricular en Asignatura</h2>
            <form action="../Service/peticion.php" method="post">
                <label>Nombre Alumno</label>
                <input type="text" name="nombre" required>
                <label>ID Asignatura</label>
                <input type="number" name="id" required>
                <input type="submit" name="insertar" value="Matricular" class="btn-accent">
            </form>
        </div>

        <div class="card-form">
            <h2> Cambio de Grupo</h2>
            <form action="../Service/peticion.php" method="post">
                <label>Nombre Alumno</label>
                <input type="text" name="nombre" required>
                <label>Nuevo Grupo</label>
                <input type="text" name="curso" required>
                <input type="submit" name="cambiar" value="Actualizar Grupo">
            </form>
        </div>

        <div class="card-form" style="border-top-color: var(--danger);">
            <h2> Borrar Alumno</h2>
            <form action="../Service/peticion.php" method="post">
                <label>Nombre Alumno</label>
                <input type="text" name="nombre" required>
                <input type="submit" name="borrar" value="Eliminar Permanentemente" class="btn-danger">
            </form>
        </div>

    </div>

</body>
</html>