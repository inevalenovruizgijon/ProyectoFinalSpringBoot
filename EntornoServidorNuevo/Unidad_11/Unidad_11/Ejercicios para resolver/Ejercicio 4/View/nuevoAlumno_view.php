<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Alumno</title>
    <link rel="stylesheet" href="../View/css/nuevoAlumno.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <div class="main-container">
        <div class="form-card">
            <h2>Registro de Nuevo Alumno</h2>

            <h3 style="color:red;"><?= $data['mensaje'] ?></h3>

            <form action="../Controller/newAlumno.php" method="POST">
                <div class="input-group">
                    <label>Matrícula</label>
                    <input type="text" name="matricula" placeholder="Ej: 123456" required value="<?=$data['matricula']?>">
                </div>

                <div class="input-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" placeholder="Introduce el nombre" required value="<?=$data['nombre']?>">
                </div>

                <div class="input-group">
                    <label>Apellido</label>
                    <input type="text" name="apellido" placeholder="Introduce los apellidos" required value="<?=$data['apellido']?>">
                </div>

                <div class="input-group">
                    <label>Curso</label>
                    <input type="text" name="curso" placeholder="Ej: 2º DAW" required value="<?=$data['curso']?>">
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fa-solid fa-floppy-disk"></i> Guardar Alumno
                </button>
            </form>
            
            <a href="../Controller/index.php" class="back-link">Volver atrás</a>
        </div>
    </div>

</body>
</html>