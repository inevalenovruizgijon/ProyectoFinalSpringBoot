<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['animales'])) {
    $_SESSION['animales'] = [];
}


if (isset($_POST['enviar'])) {
    $_SESSION['animales'][] = [
        "nombre" => $_POST['nombre'],
        "animal" => $_POST['animal'],
        "edad" => $_POST['edad'],
    ];
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['grabar'])) {
    if (!empty($_SESSION['animales'])) {
        $nombreFichero = "../archivos/animales.txt";
        $fechaCabecera = "#" . date("d-m-Y") . "#";

        if (!is_dir('archivos')) {
            mkdir('archivos', 0777, true);
        }

        $contenidoActual = file_exists($nombreFichero) ? file_get_contents($nombreFichero) : '';
        $archivo = fopen($nombreFichero, "a");


        if (strpos($contenidoActual, $fechaCabecera) === false) {
            if (!empty($contenidoActual)) {
                fwrite($archivo, PHP_EOL);
            }
            fwrite($archivo, $fechaCabecera);
        }

        foreach ($_SESSION['animales'] as $registro) {
            $linea = $registro['nombre'] . "-" . $registro['animal'] . "-" . $registro['edad'];
            fwrite($archivo, PHP_EOL . $linea);
        }


        fclose($archivo);

        $_SESSION['animales'] = [];
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Mascotas</title>
</head>
<body>

    <h1>Clínica Veterinaria</h1>
    <h3>Fecha: <?php echo date("d-m-Y"); ?></h3>

    <form action="" method="post">
        <h3>Añadir nueva mascota</h3>
        <div class="container-form">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="animal" placeholder="Tipo de animal" required>
            <input type="number" name="edad" placeholder="Edad" required>
            <input type="submit" name="enviar" value="Añadir">
        </div>
        
        <?php if (!empty($_SESSION['animales'])) : ?>
            <h3>Mascotas pendientes de grabar</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Animal</th>
                        <th>Edad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['animales'] as $registro) { ?>
                        <tr>
                            <td><?php echo ($registro['nombre']); ?></td>
                            <td><?php echo ($registro['animal']); ?></td>
                            <td><?php echo ($registro['edad']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div >
                <input type="submit" name="grabar" value="Grabar en fichero y limpiar lista" formnovalidate>
            </div>
        <?php else : ?>
            <p >No hay mascotas en la lista de espera.</p>
        <?php endif; ?>
    </form>

</body>
</html>