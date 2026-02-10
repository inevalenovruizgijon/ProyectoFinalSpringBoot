<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../View/css/nuevoAlumno.css">
</head>
<body>
     <div class="main-container">
        <div class="form-card">
            <h2>Registro de Nueva Asignatura</h2>
            
            <form action="../Controller/newAsignatura.php" method="POST">
                <div class="input-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" placeholder="Introduce la asignatura" required>
                </div>
                <button type="submit" class="btn-submit">
                    <i class="fa-solid fa-floppy-disk"></i> Guardar Asignatura
                </button>
            </form>
            
            <a href="../Controller/index.php" class="back-link">Volver atrás</a>
        </div>
    </div>
</body>
</html>