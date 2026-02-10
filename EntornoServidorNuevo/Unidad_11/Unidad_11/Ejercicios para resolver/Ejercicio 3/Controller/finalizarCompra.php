<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once "../Model/Producto.php";

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    header('Location: ../Controller/carrito.php');
    exit();
}

$productosVendidos = [];
$totalImporte = 0;
$totalImporteIva = 0;

$algunErrorStock = false;
$algunaVentaRealizada = false;

foreach ($_SESSION['carrito'] as $id => $cantidadPedida) {
    $productoBD = Producto::getProductoById($id);

    $stockDisponible = $productoBD->getStock();
    $cantidadAVender = 0;

    if ($stockDisponible >= $cantidadPedida) {
        $cantidadAVender = $cantidadPedida;
        $algunaVentaRealizada = true;
    } else if ($stockDisponible > 0) {
        $cantidadAVender = $stockDisponible;
        $algunaVentaRealizada = true;
        $algunErrorStock = true;
    } else {
        $algunErrorStock = true;
    }

    $nuevoStock = $stockDisponible - $cantidadAVender;
    $productoAux = new Producto(
        $productoBD->getId(),
        $productoBD->getNombre(),
        $productoBD->getPrecio(),
        $productoBD->getImagen(),
        $productoBD->getDetalle(),
        $nuevoStock
    );
    $productoAux->update();

    $subtotal = $productoBD->getPrecio() * $cantidadAVender;
    $totalIva = $subtotal * 1.21;

    $productosVendidos[] = [
        'id'       => $id,
        'nombre'   => $productoBD->getNombre(),
        'precio'   => $productoBD->getPrecio(),
        'cantidad' => $cantidadAVender,
        'subtotal' => $subtotal,
        'totalIva' => $totalIva
    ];

    $totalImporte += $subtotal;
    $totalImporteIva += $totalIva;
}

if ($algunaVentaRealizada && !$algunErrorStock) {
    $_SESSION['mensaje_tienda'] = "Compra realizada con éxito";
} elseif ($algunaVentaRealizada && $algunErrorStock) {
    $_SESSION['mensaje_tienda'] = "Compra realizada, pero algunos artículos no tenían stock suficiente";
} else {
    $_SESSION['mensaje_tienda'] = "Error: No se pudo comprar nada por falta de stock";
}

if (!empty($productosVendidos)) {
    $file = fopen("../View/file/factura.txt", "w");

    fwrite($file, "***********************************************************************" . PHP_EOL);
    fwrite($file, "                    FACTURA - FRUTAS ARTURO                           " . PHP_EOL);
    fwrite($file, "***********************************************************************" . PHP_EOL);
    $header = sprintf("%-5s %-20s %-10s %-10s %-10s %-10s", "ID", "Nombre", "Precio", "Cant.", "Subtot", "Total+IVA");
    fwrite($file, $header . PHP_EOL);
    fwrite($file, str_repeat("-", 70) . PHP_EOL);

    foreach ($productosVendidos as $p) {
        $linea = sprintf(
            "%-5s %-20s %-10.2f %-10d %-10.2f %-10.2f",
            $p['id'],
            substr($p['nombre'], 0, 20),
            $p['precio'],
            $p['cantidad'],
            $p['subtotal'],
            $p['totalIva']
        );
        fwrite($file, $linea . PHP_EOL);
    }

    fwrite($file, str_repeat("-", 70) . PHP_EOL);
    fwrite($file, sprintf("%57s: %10.2f", "TOTAL BASE", $totalImporte) . PHP_EOL);
    fwrite($file, sprintf("%57s: %10.2f", "TOTAL CON IVA (21%)", $totalImporteIva) . PHP_EOL);
    fwrite($file, "***********************************************************************" . PHP_EOL);
    fwrite($file, "Gracias por su compra en Frutas Arturo" . PHP_EOL);

    fclose($file);
}

unset($_SESSION['carrito']);
setcookie("carrito", "", strtotime(-1));

header('Location: ../Controller/index.php');
exit();
