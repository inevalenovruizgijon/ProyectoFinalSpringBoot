<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $serieFija = '12345';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numSerie = $_POST['numSerie'] ?? '';

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

        function estaSeleccionado($n)
        {
            return isset($_POST['num' . $n]);
        }

        $aciertos = 0;
        if (estaSeleccionado($win1)) $aciertos++;
        if (estaSeleccionado($win2)) $aciertos++;
        if (estaSeleccionado($win3)) $aciertos++;
        if (estaSeleccionado($win4)) $aciertos++;
        if (estaSeleccionado($win5)) $aciertos++;
        if (estaSeleccionado($win6)) $aciertos++;

        $premio = 0;
        if ($aciertos == 4) $premio = 0;
        elseif ($aciertos == 5) $premio = 30;
        elseif ($aciertos == 6) $premio = 100;

        if ($numSerie === $serieFija) {
            $premio += 500;
            $serieAcertada = true;
        } else {
            $serieAcertada = false;
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Lotería Primitiva Mejorada</title>
        <meta charset="UTF-8" />
    </head>

    <body>
        <h1>Lotería Primitiva Estilo Bingo</h1>

        <form method="post">
            <table border="1" cellpadding="5" cellspacing="0">
                <?php
                for ($fila = 1; $fila <= 7; $fila++) {
                    echo "<tr>";
                    for ($col = 1; $col <= 7; $col++) {
                        $num = ($fila - 1) * 7 + $col;
                        $checked = isset($_POST['num' . $num]) ? 'checked' : '';
                        echo "<td><input type='checkbox' name='num$num' id='num$num' $checked>";
                        echo "<label for='num$num'>$num</label></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>

            <p>Número de serie: <input type="text" name="numSerie" value="<?php echo htmlspecialchars($_POST['numSerie'] ?? '') ?>"></p>
            <button type="submit">Jugar</button>
        </form>

        <?php if (isset($win1)): ?>
            <h2>Combinación Ganadora</h2>
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <td><?php echo $win1; ?></td>
                    <td><?php echo $win2; ?></td>
                    <td><?php echo $win3; ?></td>
                    <td><?php echo $win4; ?></td>
                    <td><?php echo $win5; ?></td>
                    <td><?php echo $win6; ?></td>
                </tr>
            </table>
            <p>Numero de serie</p>
            <p>Aciertos: <?php echo $aciertos; ?></p>
            <p>Dinero ganado: <?php echo $premio; ?> euros</p>
            <?php if ($serieAcertada): ?>
                <p>¡Número de serie acertado! +500 euros extra</p>
            <?php endif; ?>
        <?php endif; ?>

</body>

</html>