<?php
require_once "../Model/Producto.php";
require_once "../Model/Cesta.php";
require_once "../Model/Usuario.php";
if (session_status() == PHP_SESSION_NONE) session_start();

$data['cesta'] = Cesta::getProductoByIdCliente($_SESSION['usuario']->getId());

$productosVendidos = [];
$totalImporte = 0;
$totalImporteIva = 0;

$algunErrorStock = false;
$algunaVentaRealizada = false;

foreach ($data['cesta'] as $producto) {

    $cesta = Cesta::getProductoByIdClienteCodigo($_SESSION['usuario']->getId(), $producto->getId());

    $stockDisponible = $producto->getStock();
    $cantidadAVender = 0;
    $cantidadPedida = $cesta->getCantidad();

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
        $producto->getId(),
        $producto->getNombre(),
        $producto->getPrecio(),
        $producto->getImagen(),
        $producto->getDetalle(),
        $nuevoStock
    );
    $productoAux->update();
    $cesta->delete();

    $subtotal = $producto->getPrecio() * $cantidadAVender;
    $totalIva = $subtotal * 1.21;

    $productosVendidos[] = [
        'id'       => $producto->getId(),
        'nombre'   => $producto->getNombre(),
        'precio'   => $producto->getPrecio(),
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

header('Location: ../Controller/index.php');
exit();
