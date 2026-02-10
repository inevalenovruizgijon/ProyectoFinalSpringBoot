<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $serieFija = rand(1, 999);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numSerie = $_POST['numSerie'] ?? '';
        $selectedNumbers = [];
        $totalSeleccionados = 0;

        for ($i = 1; $i <= 49; $i++) {
            if (isset($_POST['num' . $i])) {
                $selectedNumbers[$totalSeleccionados++] = $i;
            }
        }

        $win1 = rand(1, 44);
        do {
            $win2 = rand(1, 45);
        } while ($win2 == $win1);
        do {
            $win3 = rand(1, 46);
        } while ($win3 == $win1 || $win3 == $win2);
        do {
            $win4 = rand(1, 47);
        } while ($win4 == $win1 || $win4 == $win2 || $win4 == $win3);
        do {
            $win5 = rand(1, 48);
        } while ($win5 == $win1 || $win5 == $win2 || $win5 == $win3 || $win5 == $win4);
        do {
            $win6 = rand(1, 49);
        } while ($win6 == $win1 || $win6 == $win2 || $win6 == $win3 || $win6 == $win4 || $win6 == $win5);

        function estaSeleccionado($n, $selectedNumbers, $total)
        {
            for ($k = 0; $k < $total; $k++) {
                if ($selectedNumbers[$k] == $n) return true;
            }
            return false;
        }

        $aciertos = 0;
        if (estaSeleccionado($win1, $selectedNumbers, $totalSeleccionados)) $aciertos++;
        if (estaSeleccionado($win2, $selectedNumbers, $totalSeleccionados)) $aciertos++;
        if (estaSeleccionado($win3, $selectedNumbers, $totalSeleccionados)) $aciertos++;
        if (estaSeleccionado($win4, $selectedNumbers, $totalSeleccionados)) $aciertos++;
        if (estaSeleccionado($win5, $selectedNumbers, $totalSeleccionados)) $aciertos++;
        if (estaSeleccionado($win6, $selectedNumbers, $totalSeleccionados)) $aciertos++;

        if ($totalSeleccionados > 6) {
            $mensaje = "Has seleccionado más de 6 números. ¡Has hecho trampas!";
            $premio = 0;
        } else {
            $mensaje = "";
            if ($aciertos < 4) $premio = 0;
            elseif ($aciertos == 4) $premio = 0;
            elseif ($aciertos == 5) $premio = 30;
            elseif ($aciertos == 6) $premio = 100;
            else $premio = 0;

            if ((int)$numSerie === $serieFija) {
                $premio += 500;
                $serieAcertada = true;
            } else {
                $serieAcertada = false;
            }
        }
    } else {
        $numSerie = $serieFija;
        $selectedNumbers = [];
        $totalSeleccionados = 0;
        $aciertos = 0;
        $mensaje = "";
    }
    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <title>Lotería Primitiva Mejorada</title>
        <style>
            table {
                border-collapse: collapse;
            }

            td {
                width: 30px;
                height: 30px;
                text-align: center;
                vertical-align: middle;
                font-weight: bold;
            }

            .acierto {
                background-color: #4CAF50;
                color: white;
            }

            .falloSeleccion {
                background-color: black;
                color: white;
            }

            .falloCombinacion {
                background-color: #f44336;
                color: white;
            }

            .normal {
                background-color: #cccccc;
                color: black;
            }
        </style>
    </head>

    <body>
        <h1>Lotería Primitiva Estilo Bingo</h1>
        <form method="post">
            <table border="1" cellpadding="0" cellspacing="1">
                <?php
                for ($fila = 1; $fila <= 7; $fila++) {
                    echo "<tr>";
                    for ($col = 1; $col <= 7; $col++) {
                        $num = ($fila - 1) * 7 + $col;
                        $checked = "";
                        for ($k = 0; $k < $totalSeleccionados; $k++) {
                            if ($selectedNumbers[$k] == $num) {
                                $checked = 'checked';
                                break;
                            }
                        }
                        echo "<td><input type='checkbox' name='num$num' id='num$num' $checked>";
                        echo "<label for='num$num'>$num</label></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
            <p>Número de serie: <input type="text" name="numSerie" value="<?php echo htmlspecialchars($numSerie); ?>" readonly></p>
            <button type="submit">Jugar</button>
        </form>

        <?php if (isset($win1)): ?>
            <h2>Combinación Ganadora</h2>
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <td><?php echo $win1 ?></td>
                    <td><?php echo $win2 ?></td>
                    <td><?php echo $win3 ?></td>
                    <td><?php echo $win4 ?></td>
                    <td><?php echo $win5 ?></td>
                    <td><?php echo $win6 ?></td>
                </tr>
            </table>

            <h2>Tabla de resultados de la Primitiva</h2>
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <?php
                    for ($n = 1; $n <= 49; $n++) {
                        $seleccionado = false;
                        for ($k = 0; $k < $totalSeleccionados; $k++) {
                            if ($selectedNumbers[$k] == $n) {
                                $seleccionado = true;
                                break;
                            }
                        }
                        $ganador = ($n == $win1 || $n == $win2 || $n == $win3 || $n == $win4 || $n == $win5 || $n == $win6);

                        if ($seleccionado && $ganador) {
                            $clase = "acierto";
                        } elseif ($seleccionado && !$ganador) {
                            $clase = "falloSeleccion";
                        } elseif (!$seleccionado && $ganador) {
                            $clase = "falloCombinacion";
                        } else {
                            $clase = "normal";
                        }

                        echo "<td class='$clase'>$n</td>";

                        if ($n % 7 == 0) echo "</tr><tr>";
                    }
                    ?>
                </tr>
            </table>

            <p>Total números seleccionados: <?php echo $totalSeleccionados ?></p>
            <p>Número de aciertos: <?php echo $aciertos ?></p>
            <?php if ($mensaje): ?>
                <p style="color:red; font-weight:bold;"><?php echo $mensaje ?></p>
            <?php else: ?>
                <p>Dinero ganado: <?php echo $premio ?> euros</p>
                <?php if (isset($serieAcertada) && $serieAcertada): ?>
                    <p>¡Número de serie acertado! +500 euros extra</p>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

    </body>

    </html>