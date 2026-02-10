<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/login.css">
    <title>Login | Frutas Arturo</title>
</head>
<body>

    <div class="login-card">
        <h1>Frutas Arturo</h1>

        <?php if (isset($data['mensaje'])):?>
            <p><?= $data['mensaje'] ?></p>
        <?php endif?>

        <form id="loginForm" action="../Controller/loguearUsuario.php" method="post">
            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" id="pass" name="pass" required>
            </div>
            
            <button type="submit">Entrar</button>
        </form>

        <div class="footer-link">
            ¿Aun no tienes cuenta? <a href="../Controller/registrarse.php">Crea tu cuenta aquí</a>
        </div>
    </div>
</body>
</html>