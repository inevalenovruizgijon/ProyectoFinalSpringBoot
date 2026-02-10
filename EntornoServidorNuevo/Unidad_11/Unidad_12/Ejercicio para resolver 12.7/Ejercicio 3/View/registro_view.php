<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - API Mercadona</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --verde-mercadona: #00703c;
            --verde-hover: #005a30;
            --naranja-mercadona: #f07d00;
            --bg-color: #f0f2f5;
            --white: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* Contenedor principal del registro */
        .register-card {
            background: var(--white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            border-top: 8px solid var(--verde-mercadona);
        }

        h1 {
            color: var(--verde-mercadona);
            font-size: 1.6rem;
            margin-bottom: 30px;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #555;
            font-size: 0.9rem;
        }

        input[type="text"] {
            padding: 14px;
            margin-bottom: 25px;
            border: 2px solid #e1e4e8;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: var(--verde-mercadona);
            box-shadow: 0 0 0 4px rgba(0, 112, 60, 0.1);
        }

        input[type="submit"] {
            background-color: var(--naranja-mercadona); /* Naranja para diferenciar de login */
            color: white;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input[type="submit"]:hover {
            background-color: #d67000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(240, 125, 0, 0.3);
        }

        /* Enlace para volver */
        .back-link {
            margin-top: 20px;
            display: block;
            font-size: 0.85rem;
            color: #777;
            text-decoration: none;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: var(--verde-mercadona);
        }

    </style>
</head>
<body>

    <div class="register-card">
        <h1>Crear Cuenta API</h1>

        <form action="../Controller/registrarUsuario.php" method="post">
            <label for="nombre">Nombre de Usuario</label>
            <input type="text" name="nombre" id="nombre" placeholder="Tu nombre o empresa" required>
            
            <input type="submit" value="Finalizar Registro">
        </form>

        <a href="../Controller/login.php" class="back-link">← Volver atrás</a>
    </div>

</body>
</html>