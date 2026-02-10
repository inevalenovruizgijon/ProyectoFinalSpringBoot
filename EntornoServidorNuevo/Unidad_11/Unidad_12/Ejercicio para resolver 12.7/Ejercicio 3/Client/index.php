<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel API Mercadona</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --verde-mercadona: #00703c;
            --verde-hover: #005a30;
            --naranja-mercadona: #f07d00;
            --bg-color: #f0f2f5;
            --text-color: #1c1e21;
            --white: #ffffff;
            --danger: #e74c3c;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
        }

        /* Cabecera Estilo Card */
        .header-card {
            background: var(--verde-mercadona);
            color: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 112, 60, 0.2);
            text-align: center;
            margin-bottom: 30px;
            width: 100%;
            max-width: 800px;
        }

        .header-card h1 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .token-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-top: 10px;
            font-family: monospace;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Contenedor de Formularios (Grid) */
        .main-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 800px;
        }

        form {
            background: var(--white);
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
            border: 1px solid #e1e4e8;
        }

        form:hover {
            transform: translateY(-5px);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            color: #555;
        }

        input[type="text"], 
        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 2px solid #edeff2;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 1rem;
            transition: all 0.3s;
        }

        input:focus {
            border-color: var(--verde-mercadona);
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 0 4px rgba(0, 112, 60, 0.1);
        }

        /* Botones Estilizados */
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: var(--verde-mercadona);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s;
        }

        input[type="submit"]:hover {
            background-color: var(--verde-hover);
            box-shadow: 0 4px 12px rgba(0, 112, 60, 0.2);
        }

        /* Footer y Botón Salir */
        .footer-links {
            margin-top: 40px;
            width: 100%;
            text-align: center;
        }

        .btn-logout {
            text-decoration: none;
            color: var(--danger);
            font-weight: 600;
            padding: 10px 25px;
            border: 2px solid var(--danger);
            border-radius: 10px;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background-color: var(--danger);
            color: white !important;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .main-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="header-card">
        <h1>Bienvenido, <?= $data['usuario']->getNombre() ?></h1>
        <div class="token-badge">Token Activo: <?= $data['usuario']->getToken() ?></div>
        <div><?= $data['mensaje'] ?></div>
    </div>

    <div class="main-container">
        <form action="../Service/peticion.php" method="get">
            <label> Buscar Producto</label>
            <input type="text" name="nombre" placeholder="Ej: Aceite, Leche...">
            <input type="submit" name="FiltrarPorNombre" value="Buscar por nombre">
        </form>

        <form action="../Service/peticion.php" method="get">
            <label> Rango de Precios</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" name="min" placeholder="Mín" required step="0.01">
                <input type="number" name="max" placeholder="Máx" required step="0.01">
            </div>
            <input type="submit" name="FiltrarPorPrecio" value="Filtrar por precio">
        </form>
    </div>

    <div class="footer-links">
        <a href="../Controller/cerrar_sesion.php" class="btn-logout">Cerrar Sesión Segura</a>
    </div>

</body>
</html>