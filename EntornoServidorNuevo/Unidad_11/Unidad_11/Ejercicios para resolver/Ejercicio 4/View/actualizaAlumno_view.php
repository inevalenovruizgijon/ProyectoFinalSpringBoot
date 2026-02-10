<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View//css/actualizaAlumno.css">
    <title>Document</title>
</head>
<body>
    
 <div class="card">
        <h2>Modificar Alumno</h2>

        <form action="../Controller/updateAlumno.php" method="post">
            <div class="form-group">
                <label>Matricula</label>
                <input type="text" name="matricula" value="<?= $data['alumno']->getMatricula()?>" readonly>
            </div>

            <div class="form-group">
                <label>Nombre Completo</label>
                <input type="text" name="nombre" value="<?= $data['alumno']->getNombre()?>" required>
            </div>

            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" value="<?= $data['alumno']->getApellido()?>">
            </div>

            <div class="form-group">
                <label>Curso</label>
                <input type="text" name="curso" value="<?= $data['alumno']->getCurso()?>">
            </div>

            <div class="buttons">
                <a href="../Controller/index.php" class="btn-back">Cancelar</a>
                <input type="submit" value="Guardar Cambios" name="mod">
            </div>
        </form>
    </div>

</body>
</html>