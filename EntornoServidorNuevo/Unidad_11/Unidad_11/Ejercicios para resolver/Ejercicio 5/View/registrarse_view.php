<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Frutas Arturo</title>
    <style>
        /* Importar la fuente oficial de Frutas Arturo */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        :root {
            --primary-color: #2ecc71; 
            --secondary-color: #27ae60;
            --accent-color: #f39c12; 
            --text-color: #2c3e50;
            --bg-color: #f4f7f6;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 380px;
            text-align: center;
            animation: aparecer 0.4s ease-out;
        }

        h1 {
            color: var(--text-color);
            font-size: 1.8rem;
            margin: 0;
            font-weight: 600;
        }

        /* Detalle del subrayado naranja */
        h1::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--accent-color);
            margin: 8px auto 30px;
            border-radius: 2px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #95a5a6;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        /* Aplicando estilos exactos a los campos de texto y password */
        input[type="text"], 
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #f1f1f1;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: var(--text-color);
            background-color: #f9f9f9;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            background-color: #fff;
            box-shadow: 0 0 8px rgba(46, 204, 113, 0.1);
        }

        /* Botón con el estilo de Frutas Arturo */
        button {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 14px 25px;
            width: 100%;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            margin-top: 10px;
            letter-spacing: 1px;
        }

        button:hover {
            background-color: #e67e22;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(243, 156, 18, 0.2);
        }

        button:active {
            transform: translateY(0);
        }

        /* Estilo para el enlace de "Ya tengo cuenta" */
        .footer-link {
            margin-top: 20px;
            font-size: 0.85rem;
            color: #7f8c8d;
        }

        .footer-link a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .footer-link a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }

        /* Animación de entrada */
        @keyframes aparecer {
            from { 
                opacity: 0; 
                transform: translateY(-20px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h1>Registra tu cuenta</h1>
        
        <form action="../Controller/AñadirUsuario.php" method="POST">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Unirme ahora</button>
        </form>

        <div class="footer-link">
            ¿Ya tienes cuenta? <a href="../Controller/login.php">Inicia sesión</a>
        </div>
    </div>

</body>
</html>