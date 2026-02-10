<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/css/ejercicio_5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
</head>

<body>

    <header>
        <h1>APRENDE PHP CON EJERCICIOS</h1>
        <h2>SOLUCIONES A LOS EJERCICIOS</h2>
        <h3>6. Sesiones y Cookies</h3>
        <a href="../Controller/carrito.php" class="cart-link">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </header>

    <main>
        <h2 class="tienda">Tienda on-line <span>Frutas Arturo</span></h2>
        <section class="producto">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Detalle</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['productos'] as $producto): ?>
                        <tr class="producto">
                            <td class="id"><?= $producto->getId() ?></td>
                            <td class="nombre"><?= $producto->getNombre() ?></td>
                            <td class="precio"><?= $producto->getPrecio() ?></td>
                            <td class="imagen"><img src="../View/img/<?= $producto->getImagen() ?>" alt=""></td>
                            <td class="descripcion"> <?= $producto->getDetalle() ?></td>
                            <td class="stock"> <?= $cantTemp[$producto->getId()] ?></td>
                            <?php if ($cantTemp[$producto->getId()]>0): ?>
                                    <td class="comprar"><a href="../Controller/comprarProducto.php?cod_producto=<?= $producto->getId() ?>" class="btn btn-borrar">Comprar</a></td>
                            <?php else: ?>
                                    <td class="comprar"><a href="#" class="btn btn-borrar">Stock maximo</a></td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </section>
    </main>

    <a href="../Controller/cerrarSesion.php" class="btn-logout">
    <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
</a>

<?php if (isset($_SESSION['mensaje_tienda'])): ?>
    <div id="aviso-flotante" class="toast-notificacion">
        <div class="toast-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div class="toast-content">
            <strong>SISTEMA</strong>
            <p><?= $_SESSION['mensaje_tienda'] ?></p>
        </div>
    </div>
<?php endif; ?>

<script>
    setTimeout(() => {
        const mensaje = document.getElementById('aviso-flotante');
        if (mensaje) {
            // Aplicamos el desvanecimiento que definiste en tu CSS (transition: all 0.6s ease)
            mensaje.style.opacity = '0';
            mensaje.style.transform = 'translateY(-20px)';
            
            // Lo eliminamos del DOM cuando termine la transición
            setTimeout(() => mensaje.remove(), 600);
        }
    }, 3000); // 3 segundos visible
</script>

</body>

</html>