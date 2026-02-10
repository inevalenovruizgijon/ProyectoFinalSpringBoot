<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - Frutas Arturo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        :root {
            --primary-color: #2ecc71;
            /* Verde Frutas Arturo */
            --accent-color: #f39c12;
            /* Naranja Frutas Arturo */
            --bg-color: #f4f7f6;
            --text-color: #2c3e50;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Cabecera consistente con el Index */
        header {
            background: var(--primary-color);
            color: white;
            padding: 2rem 1rem;
            text-align: center;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        header h2 {
            margin: 0;
            font-weight: 400;
            font-size: 1.5rem;
            color: white;
            width: auto;
        }

        /* Botón volver flotante o en cabecera */
        .shop-link {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: white;
            color: var(--primary-color);
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.8rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 1000;
            text-transform: uppercase;
        }

        .shop-link:hover {
            background-color: var(--accent-color);
            color: white;
        }

        main {
            width: 100%;
            max-width: 1100px;
            padding: 20px;
        }

        h2.titulo-carrito {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: var(--text-color);
        }

        /* Estilo de Tabla de Tarjetas */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        /* Encabezados grises pequeños */
        tr:first-child td {
            background-color: transparent;
            color: #95a5a6;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            padding: 0 20px 5px;
            text-align: center;
        }

        /* Filas blancas tipo tarjeta */
        tr.producto {
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        tr.producto td {
            padding: 20px;
            text-align: center;
            vertical-align: middle;
        }

        tr.producto td:first-child {
            border-radius: 12px 0 0 12px;
        }

        tr.producto td:last-child {
            border-radius: 0 12px 12px 0;
        }

        .precio,
        .total {
            font-weight: 600;
            color: var(--primary-color);
        }

        .imagen img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #eee;
        }

        /* Botones de acción */
        .btn {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-modificar {
            background: #3498db;
            color: white;
        }

        .btn-borrar {
            background: #e74c3c;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
            transform: translateY(-2px);
        }

        /* Acciones finales */
        .cart-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        /* 5. ACCIONES DEL CARRITO (Botones inferiores) */
        .cart-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 40px;
            width: 100%;
        }

        .cart-actions .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 30px;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        /* Botón Vaciar (Gris/Rojo suave) */
        .btn-vaciar {
            background-color: #95a5a6;
            color: white !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-vaciar:hover {
            background-color: #7f8c8d;
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        /* Botón Finalizar (Naranja Arturo) */
        .btn-finalizar {
            background-color: #f39c12;
            /* El naranja de tu imagen */
            color: white !important;
            box-shadow: 0 4px 6px rgba(243, 156, 18, 0.3);
        }

        .btn-finalizar:hover {
            background-color: #e67e22;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(230, 126, 34, 0.4);
        }

        /* Botón Factura (Azul Grisáceo) */
        .btn-factura {
            background-color: #334155;
            color: white !important;
            padding: 14px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .btn-factura:hover {
            background-color: #1e293b;
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {

            table,
            tr,
            td {
                display: block;
                width: 100%;
            }

            tr:first-child {
                display: none;
            }

            tr.producto {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

    <a href="../Controller/index.php" class="shop-link">
        <i class="fa-solid fa-arrow-left"></i> Tienda
    </a>

    <header>
        <h2>6. Sesiones y Cookies</h2>
    </header>

    <main>
        <?php if (isset($data['productos']) && count($data['productos']) > 0): ?>
            <h2 class="titulo-carrito">Tu <span>Carrito</span></h2>

            <table>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Precio</td>
                    <td>Imagen</td>
                    <td>Detalle</td>
                    <td>Cant.</td>
                    <td>Total</td>
                    <td>Comprar</td>
                    <td>Quitar</td>
                </tr>

                <?php foreach ($data['productos'] as $producto): ?>
                    <tr class="producto">
                        <td class="id"><?= $producto[0]->getId() ?></td>
                        <td class="nombre"><b><?= $producto[0]->getNombre() ?></b></td>
                        <td class="precio"><?= $producto[0]->getPrecio() ?>$</td>
                        <td class="imagen"><img src="../View/img/<?= $producto[0]->getImagen() ?>" alt=""></td>
                        <td class="descripcion"><?= $producto[0]->getDetalle() ?></td>
                        <td class="cantidad"><?= $producto[1] ?></td>
                        <td class="total"><?= number_format($producto[0]->getPrecio() * $producto[1], 2) ?>$</td>
                        <?php if ($producto[1]<$producto[0]->getStock()): ?>
                                    <td class="comprar"><a href="../Controller/comprarProducto.php?id=<?= $producto[0]->getId() ?>" class="btn btn-modificar">Comprar</a></td>
                            <?php else: ?>
                                    <td class="comprar"><a href="#" class="btn btn-modificar">Stock maximo</a></td>
                            <?php endif ?>
                        <td>
                            <a href="../Controller/eliminarProducto.php?id=<?= $key ?>" class="btn btn-borrar">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div class="cart-actions">

                <a href="../Controller/vaciarCarrito.php" class="btn btn-vaciar">Vaciar Carrito</a>
                <a href="../Controller/finalizarCompra.php" class="btn btn-finalizar">Finalizar Compra</a>

            <?php else: ?>
                <h2 class="titulo-carrito">El carrito está vacío</h2>
            <?php endif; ?>

            <?php if (file_exists("../View/file/factura.txt")): ?>
                <a href="../View/file/factura.txt" class="btn-factura" target="_blank">Ver Última Factura</a>
            <?php endif; ?>
            </div>
    </main>

</body>

</html>