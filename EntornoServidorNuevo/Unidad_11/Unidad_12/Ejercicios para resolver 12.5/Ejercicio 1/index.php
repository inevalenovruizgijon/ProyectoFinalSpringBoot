<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>App del Tiempo</title>
    <style>
        :root {
            --bg-color: #202124;
            --card-hover: #303134;
            --text-main: #e8eaed;
            --text-secondary: #9aa0a6;
            --google-blue: #8ab4f8;
            --google-yellow: #fabb05;
        }

        body {
            background-color: #171717;
            color: var(--text-main);
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 50px;
        }

        h1 {
            font-weight: 400;
            margin-bottom: 30px;
        }

        /* Estilo del Buscador */
        form {
            margin-bottom: 40px;
            background: var(--bg-color);
            padding: 15px 25px;
            border-radius: 30px;
            border: 1px solid #5f6368;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: box-shadow 0.3s;
        }

        form:focus-within {
            box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
            border-color: transparent;
        }

        input[type="text"] {
            background: transparent;
            border: none;
            color: white;
            outline: none;
            font-size: 16px;
            width: 250px;
        }

        input[type="submit"] {
            background: var(--google-blue);
            border: none;
            color: #202124;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }

        .contenedor-clima {
            display: flex;
            background-color: var(--bg-color);
            color: var(--text-main);
            padding: 10px;
            justify-content: space-around;
            border-radius: 12px;
            width: 90%;
            max-width: 800px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            border: 1px solid #3c4043;
        }

        .dia-card {
            text-align: center;
            padding: 20px 10px;
            flex: 1;
            transition: background 0.2s;
            border-radius: 8px;
            cursor: default;
        }

        .dia-card:hover {
            background-color: var(--card-hover);
        }

        .dia-card:not(:last-child) {
            border-right: 1px solid #3c4043;
        }

        .dia-nombre {
            text-transform: capitalize;
            margin-bottom: 12px;
            font-size: 0.85em;
            color: var(--text-secondary);
        }

        .dia-icono {
            font-size: 2em;
            margin-bottom: 15px;
            display: block;
        }

        .temp-max {
            font-weight: 500;
            font-size: 1.2em;
        }

        .temp-min {
            color: var(--text-secondary);
            font-size: 1em;
            margin-left: 5px;
        }

        .fa-sun {
            color: var(--google-yellow);
        }

        .fa-cloud {
            color: var(--text-secondary);
        }

        .fa-cloud-sun {
            color: #fce18a;
        }

        .fa-cloud-rain {
            color: var(--google-blue);
        }

        .fa-snowflake {
            color: #a1eafb;
        }

        .fa-cloud-bolt {
            color: #d397f8;
        }
    </style>
</head>

<body>

    <h1><i class="fa-solid fa-cloud-sun-rain"></i> Clima</h1>

    <form action="peticionTiempo.php" method="post">
        <i class="fa-solid fa-magnifying-glass" style="color: #9aa0a6;"></i>
        <input type="text" name="ciudad" placeholder="Busca una ciudad (ej: Sevilla)">
        <input type="submit" value="Buscar">
    </form>

    <?php if (isset($pronosticoPorDia)): ?>
        <?php if ($http_response_header[0] == "HTTP/1.1 200 OK"): ?>
            <h1>Tiempo <?= $_REQUEST['ciudad'] ?></h1>
            <div class="contenedor-clima">
                <?php foreach ($pronosticoPorDia as $diaNombre => $item):
                    $diaTraducido = $diasSemanas[$diaNombre];
                    $main = $item->weather[0]->main;

                    $iconClass = "fa-cloud";
                    if ($main == "Clear") $iconClass = "fa-sun";
                    if ($main == "Rain" || $main == "Drizzle") $iconClass = "fa-cloud-rain";
                    if ($main == "Clouds") $iconClass = "fa-cloud-sun";
                    if ($main == "Snow") $iconClass = "fa-snowflake";
                    if ($main == "Thunderstorm") $iconClass = "fa-cloud-bolt";
                ?>
                    <div class="dia-card">
                        <div class="dia-nombre"><?php echo $diaTraducido; ?></div>
                        <i class="fa-solid <?php echo $iconClass; ?> dia-icono"></i>
                        <div>
                            <span class="temp-max"><?php echo round($item->main->temp_max); ?>°</span>
                            <span class="temp-min"><?php echo round($item->main->temp_min); ?>°</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>