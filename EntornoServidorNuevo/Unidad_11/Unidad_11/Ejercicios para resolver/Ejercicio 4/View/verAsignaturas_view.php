<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
</head>

<body>

    <main>
        <h2 class="tienda">Escuela <span>Ies Ruiz Gijon</span></h2>
        <section class="asignatura">

            <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Ver Alumno</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['asignaturas'] as $asignatura): ?>
                        <tr class="asignatura">
                            <td class="codigo"><?= $asignatura->getcodigo() ?></td>
                            <td class="nombre"><?= $asignatura->getNombre() ?></td>
                            <td class="verAlumnos"><a href="../Controller/alumnoAsignatura.php?codigo=<?= $asignatura->getcodigo() ?>" class="btn btn-asignatura">Ver Alumnos</a></td>
                            <td class="eliminar"><a href="../Controller/borraAsignatura.php?codigo=<?= $asignatura->getCodigo() ?>" class="btn btn-borrar">Eliminar</a></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                        <td class="nuevo"><a href="../Controller/nuevaAsignatura.php" class="btn btn-nuevo">Nuevo asignatura</a></td>
                        <td class="nuevo"><a href="../Controller/index.php" class="btn btn-nuevo">Volver</a></td>
                    </tr>
                </tbody>
            </table>

        </section>
    </main>

</body>

</html>