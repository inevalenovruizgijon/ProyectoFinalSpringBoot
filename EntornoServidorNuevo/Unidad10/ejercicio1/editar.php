<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <?php
    if (!isset($_GET['dni'])) {
        die("Error: No DNI.");
    }

    $dni_original = $_GET['dni'];
    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");

    $stmt = $conexion->prepare("SELECT * FROM cliente WHERE DNI = ?");
    $stmt->execute([$dni_original]);
    $cliente = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$cliente) {
        die("Cliente no encontrado: $dni_original");
    }

    if ($_POST && isset($_POST['guardar'])) {
        $stmt = $conexion->prepare("UPDATE cliente SET Nombre=?, Dirección=?, Teléfono=? WHERE DNI=?");
        $stmt->execute([
            $_POST['nombre'], 
            $_POST['dirección'], 
            $_POST['teléfono'],
            $dni_original  
        ]);
        echo "<p style='color:green;'>¡Cliente actualizado! <a href='index.php'>Ver lista</a></p>";
        exit;
    }
    ?>

    <h2>Editar Cliente: <?= ($cliente->DNI) ?></h2>
    <form action="" method="post">
        <input type="hidden" name="dni_original" value="<?= ($dni_original) ?>">
        <label>DNI: <?= ($cliente->DNI) ?> (no editable)</label><br><br>
        <label>Nombre: <input type="text" name="nombre" value="<?= ($cliente->Nombre) ?>" required></label><br><br>
        <label>Dirección: <input type="text" name="dirección" value="<?= ($cliente->Dirección) ?>" required></label><br><br>
        <label>Teléfono: <input type="text" name="teléfono" value="<?= ($cliente->Teléfono) ?>" required></label><br><br>
        <input type="submit" name="guardar" value="Guardar cambios">
        <a href="ejercicio1.php">Cancelar</a>
    </form>

    <?php $conexion = null; ?>
</body>
</html>