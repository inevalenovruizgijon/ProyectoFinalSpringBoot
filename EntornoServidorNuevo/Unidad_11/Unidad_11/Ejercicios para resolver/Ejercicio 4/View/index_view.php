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
        <section class="alumno">

            <table>
                <thead>
                    <tr>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Curso</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                        <th>Asignaturas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['alumnos'] as $alumno): ?>
                        <tr class="alumno">
                            <td class="matricula"><?= $alumno->getMatricula() ?></td>
                            <td class="nombre"><?= $alumno->getNombre() ?></td>
                            <td class="apellidos"><?= $alumno->getApellido() ?></td>
                            <td class="curso"><?= $alumno->getCurso() ?></td>
                            <td class="modificar"><a href="../Controller/actualizarAlumno.php?matricula=<?= $alumno->getMatricula() ?>" class="btn btn-modificar">Editar</a></td>
                            <td class="eliminar"><a href="../Controller/borraAlumno.php?matricula=<?= $alumno->getMatricula() ?>" class="btn btn-borrar">Eliminar</a></td>
                            <td class="verMatriculados"><a href="../Controller/asignaturaAlumno.php?matricula=<?=$alumno->getMatricula()?>" class="btn btn-asignatura">Asignaturas</a></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                        <td class="nuevo"><a href="../Controller/nuevoAlumno.php" class="btn btn-nuevo">Nuevo Alumno</a></td>
                        <td class="nuevo"><a href="../Controller/verAsignaturas.php" class="btn btn-nuevo">Ver asignaturas</a></td>
                    </tr>
                </tbody>
            </table>

        </section>
    </main>

</body>

</html>