<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        h1 {
            color: #00703c;
            /* Verde Mercadona */
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Contenedor del formulario */
        form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            border-top: 5px solid #00703c;
        }

        /* Etiquetas e inputs */
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            /* Asegura que el padding no rompa el ancho */
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #00703c;
            outline: none;
        }

        /* Botón de login */
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #00703c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #005a30;
        }

        /* Enlace de registro y mensajes */
        span {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        a {
            color: #f07d00;
            /* Naranja Mercadona */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Mensajes de error/info del servidor */
        p {
            margin-top: 15px;
            padding: 10px;
            color: #d9534f;
            /* Rojo para errores */
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>API Sobre el mercadona</h1>

    <form action="../Controller/loguearUsuario.php" method="post">
        <label for="">Nombre: </label>
        <input type="text" name="nombre">
        <label for="">Token: </label>
        <input type="text" name="pass">
        <input type="submit" value="Loguearse">
    </form>

    <span>aun no has conseguido tu clave registrate ya <a href="../Controller/registro.php"> registrarse</a></span>

    <p><?= $data['mensaje'] ?></p>



</body>

</html>