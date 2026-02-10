<?php
$url = "http://rickandmortyapi.com/api/character/";
$personajes = [];
$info = [];
$mensaje = "";

$nombre  = $_GET['nombre']  ?? '';
$estado  = $_GET['estado']  ?? '';
$genero  = $_GET['genero']  ?? '';
$especie = $_GET['especie'] ?? '';
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$paramsAPI = [];
if (!empty($nombre))  $paramsAPI['name'] = $nombre;
if (!empty($estado))  $paramsAPI['status'] = $estado;
if (!empty($genero))  $paramsAPI['gender'] = $genero;
if (!empty($especie)) $paramsAPI['species'] = $especie;
// SELECT * FROM personajes LIMIT 20 OFFSET 0;
$paramsAPI['page'] = $paginaActual;

$paramsNavegacion = [
    'nombre'  => $nombre,
    'estado'  => $estado,
    'genero'  => $genero,
    'especie' => $especie
];

$query = http_build_query($paramsAPI);
$urlFinal = $url . "?" . $query;
$response = @file_get_contents($urlFinal);

if ($response !== false) {
    $data = json_decode($response, true);
    $personajes = $data['results'] ?? [];
    $info = $data['info'] ?? [];
} else {
    $mensaje = "No se encontraron resultados.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Multibuscador Rick y Morty - Corregido</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #e9ecef;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: flex-end;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        input,
        select,
        button {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            padding: 8px 20px;
            font-weight: bold;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .card-body {
            padding: 15px;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .paginacion {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        .btn-nav {
            background: #fff;
            border: 1px solid #007bff;
            color: #007bff;
            text-decoration: none;
            padding: 5px 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Buscador Avanzado Rick y Morty</h1>

        <form method="GET">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?= $_GET['nombre'] ?? '' ?>" placeholder="Ej: Rick">
            </div>

            <div class="form-group">
                <label>Especie:</label>
                <input type="text" name="especie" value="<?= $_GET['especie'] ?? '' ?>" placeholder="Ej: Alien">
            </div>

            <div class="form-group">
                <label>Estado:</label>
                <select name="estado">
                    <option value="">Cualquiera</option>
                    <option value="alive" <?= ($_GET['estado'] ?? '') == 'alive' ? 'selected' : '' ?>>Vivo</option>
                    <option value="dead" <?= ($_GET['estado'] ?? '') == 'dead' ? 'selected' : '' ?>>Muerto</option>
                </select>
            </div>

            <div class="form-group">
                <label>Género:</label>
                <select name="genero">
                    <option value="">Cualquiera</option>
                    <option value="female" <?= ($_GET['genero'] ?? '') == 'female' ? 'selected' : '' ?>>Femenino</option>
                    <option value="male" <?= ($_GET['genero'] ?? '') == 'male' ? 'selected' : '' ?>>Masculino</option>
                </select>
            </div>

            <button type="submit">Aplicar Filtros</button>
            <a href="index.php" style="font-size: 0.8rem; color: #dc3545;">Borrar todo</a>
        </form>

        <?php if ($info): ?>
            <p>Resultados: <strong><?= $info['count'] ?></strong> encontrados.</p>
        <?php endif; ?>

        <div class="grid">
            <?php if (!empty($personajes)): ?>
                <?php foreach ($personajes as $p): ?>
                    <div class="card">
                        <img src="<?= $p['image'] ?>" alt="<?= $p['name'] ?>">
                        <div class="card-body">
                            <h3><?= $p['name'] ?></h3>
                            <span class="badge"><?= $p['status'] ?></span>
                            <p><small><b>Especie:</b> <?= $p['species'] ?></small></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p><?= $mensaje ?></p>
            <?php endif; ?>
        </div>

        <?php if ($info && $info['pages'] > 1): ?>
            <div class="paginacion">
                <?php if ($paginaActual > 1): ?>
                    <?php
                    $linkPrev = $paramsNavegacion;
                    $linkPrev['pagina'] = $paginaActual - 1;
                    ?>
                    <a class="btn-nav" href="?<?= http_build_query($linkPrev) ?>">« Anterior</a>
                <?php endif; ?>

                <span>Página <b><?= $paginaActual ?></b> de <b><?= $info['pages'] ?></b></span>

                <?php if ($paginaActual < $info['pages']): ?>
                    <?php
                    $linkNext = $paramsNavegacion;
                    $linkNext['pagina'] = $paginaActual + 1;
                    ?>
                    <a class="btn-nav" href="?<?= http_build_query($linkNext) ?>">Siguiente »</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>