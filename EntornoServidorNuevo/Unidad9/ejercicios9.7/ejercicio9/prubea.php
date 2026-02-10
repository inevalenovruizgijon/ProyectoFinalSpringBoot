<?php
include "Coche.php";
include "CocheDeLujo.php";
$modeloCaro = '';
$precioCaro = 0;

$coches = [];
$mensaje = '';

function actualizarCocheCaro($modelo, $precio) {
    global $modeloCaro, $precioCaro;
    if ($precio > $precioCaro) {
        $modeloCaro = $modelo;
        $precioCaro = $precio;
    }
}

if (!empty($_POST)) {
    $matricula = $_POST['matricula'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $precio = floatval($_POST['precio'] ?? 0);
    $esLujo = isset($_POST['lujo']);

    if ($matricula && $modelo && $precio > 0) {
        if ($esLujo) {
            $coche = new CocheLujo($matricula, $modelo, $precio, $suplemento);
            actualizarCocheCaro($modelo, $precio); 
        } else {
            $coche = new Coche($matricula, $modelo, $precio);
            actualizarCocheCaro($modelo, $precio);
        }
        $coches[] = $coche;
        $mensaje = "Coche añadido: $modelo";
    } else {
        $mensaje = "Datos incompletos.";
    }
}

function mostrarTabla($coches) {
    $html = "<table border='1' cellpadding='5'><tr><th>Matrícula</th><th>Modelo</th><th>Precio</th><th>Suplemento</th></tr>";
    if (empty($coches)) {
        $html .= "<tr><td colspan='4'>No hay coches añadidos aún.</td></tr>";
    } else {
        foreach ($coches as $coche) {
            $html .= $coche->toString();
        }
    }
    $html .= "</table>";
    return $html;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Coches</title>
</head>
<body>

<h1>
<?php
if ($modeloCaro) {
    echo "Modelo más caro: $modeloCaro - Precio base: " . number_format($precioCaro,2) . " €";
} else {
    echo "No hay coches añadidos";
}
?>
</h1>

<form method="POST">
    <label>Matrícula: <input type="text" name="matricula" required></label><br><br>
    <label>Modelo: <input type="text" name="modelo" required></label><br><br>
    <label>Precio: <input type="number" name="precio" min="0" step="0.01" required></label><br><br>
    <label>¿Coche de lujo? <input type="checkbox" name="lujo" id="lujo"></label><br><br>
    <label>Suplemento: <input type="number" name="suplemento" min="0" step="0.01" value="0" id="suplemento" disabled></label><br><br>
    <button type="submit">Añadir Coche</button>
</form>

<p><?php echo $mensaje; ?></p>

<?php
echo mostrarTabla($coches);
?>

<script>
    const checkbox = document.getElementById('lujo');
    const suplementoInput = document.getElementById('suplemento');
    checkbox.addEventListener('change', () => {
        suplementoInput.disabled = !checkbox.checked;
        if (!checkbox.checked) suplementoInput.value = '0';
    });
</script>

</body>
</html>