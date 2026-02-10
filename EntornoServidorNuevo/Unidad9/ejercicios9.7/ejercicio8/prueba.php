<?php
  include "Zona.php";  

$zonaPrincipal = new Zona('Principal', 1000, 20);
$zonaCompraVenta = new Zona('Compra-Venta', 200, 35);
$zonaVip = new Zona('VIP', 25, 50);

$mensaje = '';

if (!empty($_POST)) {
    $zonaSeleccionada = $_POST['zona'] ?? '';
    $cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;

    switch ($zonaSeleccionada) {
        case 'Principal':
            $mensaje = $zonaPrincipal->venderEntradas($cantidad);
            break;
        case 'Compra-Venta':
            $mensaje = $zonaCompraVenta->venderEntradas($cantidad);
            break;
        case 'VIP':
            $mensaje = $zonaVip->venderEntradas($cantidad);
            break;
        default:
            $mensaje = "Zona no válida.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Venta de Entradas Circo del Sol</title>
</head>
<body>

<h1>Venta de Entradas Circo del Sol</h1>

<h2>Información de zonas</h2>
<ul>
    <li><?php echo $zonaPrincipal->mostrarInfo(); ?></li>
    <li><?php echo $zonaCompraVenta->mostrarInfo(); ?></li>
    <li><?php echo $zonaVip->mostrarInfo(); ?></li>
</ul>

<h2>Formulario de venta</h2>
<form method="POST">
    <label for="zona">Zona:</label>
    <select name="zona" id="zona" required>
        <option value="">--Selecciona zona--</option>
        <option value="Principal">Principal</option>
        <option value="Compra-Venta">Compra-Venta</option>
        <option value="VIP">VIP</option>
    </select>
    <br><br>
    <label for="cantidad">Cantidad de entradas:</label>
    <input type="number" id="cantidad" name="cantidad" min="1" required>
    <br><br>
    <button type="submit">Vender Entradas</button>
</form>

<?php if ($mensaje): ?>
    <p><strong><?php echo $mensaje; ?></strong></p>
<?php endif; ?>

<h2>Ingresos por zona</h2>
<ul>
    <li>Principal: <?php echo $zonaPrincipal->ingresoTotal; ?> €</li>
    <li>Compra-Venta: <?php echo $zonaCompraVenta->ingresoTotal; ?> €</li>
    <li>VIP: <?php echo $zonaVip->ingresoTotal; ?> €</li>
</ul>

</body>
</html>