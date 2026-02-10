<!DOCTYPE html>
<html lang="es">
<head>
    <title>Document</title>
   
</head>
<body>
<h1>App de Datos de Futbol</h1>

<?php
$mi_token = '4cadec12762141a98024d2f296ba46e9';

function llamarApi($url_completa, $token, &$codigo_http) {
    $opciones = [
        'http' => [
            'method' => 'GET',
            'header' => "X-Auth-Token: $token\r\nUser-Agent: MiAppFutbol/1.0\r\n"
        ]
    ];
    $contexto = stream_context_create($opciones);
    
    $respuesta = @file_get_contents($url_completa, false, $contexto);
    $codigo_http = $http_response_header[0] ?? 'Sin respuesta';
    
    if ($respuesta === false) {
        throw new Exception("No puedo conectar. Codigo HTTP: $codigo_http");
    }
    
    $datos = json_decode($respuesta, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('El JSON tiene problemas: ' . json_last_error_msg());
    }
    
    return $datos;
}

$liga_seleccionada = $_POST['liga'] ?? $_GET['liga'] ?? '';
$tipo_datos = $_POST['tipo'] ?? $_GET['tipo'] ?? 'teams';

echo '<hr>
      <h2>Buscar datos de una liga</h2>
      <form method="POST">
          <input type="hidden" name="action" value="buscar">
          Liga: 
          <select name="liga">
              <option value="2021" ' . ($liga_seleccionada == '2021' ? 'selected' : '') . '>Premier League</option>
              <option value="2014" ' . ($liga_seleccionada == '2014' ? 'selected' : '') . '>La Liga Espana</option>
              <option value="2002" ' . ($liga_seleccionada == '2002' ? 'selected' : '') . '>Bundesliga</option>
              <option value="2019" ' . ($liga_seleccionada == '2019' ? 'selected' : '') . '>Serie A Italia</option>
              <option value="2001">Champions League</option>
          </select>
          
          Mostrar: 
          <select name="tipo">
              <option value="teams" ' . ($tipo_datos == 'teams' ? 'selected' : '') . '>Lista de equipos</option>
              <option value="standings" ' . ($tipo_datos == 'standings' ? 'selected' : '') . '>Clasificacion</option>
              <option value="matches" ' . ($tipo_datos == 'matches' ? 'selected' : '') . '>Partidos recientes</option>
          </select>
          <button type="submit">Cargar informacion</button>
      </form>';

echo '<hr><h2>Todas las ligas de la API</h2>';
$codigo_api = '';
try {
    $todas_ligas = llamarApi('https://api.football-data.org/v4/competitions', $mi_token, $codigo_api);
    
    echo '<table>';
    echo '<tr><th>ID Liga</th><th>Nombre</th><th>Codigo</th><th>Que quieres ver</th></tr>';
    
    foreach (array_slice($todas_ligas['competitions'] ?? [], 0, 12) as $una_liga) {
        $id_liga = $una_liga['id'];
        $nombre_liga = ($una_liga['name']);
        $codigo_liga = ($una_liga['code'] ?? 'No tiene');
        
        echo "<tr>";
        echo "<td>$id_liga</td>";
        echo "<td><strong>$nombre_liga</strong></td>";
        echo "<td>$codigo_liga</td>";
        echo "<td>
                <a href='?liga=$id_liga&tipo=teams'>Equipos</a> | 
                <a href='?liga=$id_liga&tipo=standings'>Tabla</a> | 
                <a href='?liga=$id_liga&tipo=matches'>Partidos</a>
              </td>";
        echo "</tr>";
    }
    echo '</table>';
    
    echo "<p class='ok'>Todo bien! API responde: $codigo_api. Cargue " . 
         count($todas_ligas['competitions'] ?? []) . " ligas.</p>";
         
} catch (Exception $error) {
    echo "<p class='error'>Problema cargando ligas: " . $error->getMessage() . "</p>";
}

if ($liga_seleccionada && $tipo_datos) {
    echo "<hr>";
    echo "<h2>Datos de la liga $liga_seleccionada - $tipo_datos</h2>";
    
    $codigo_detalle = '';
    try {
        $url_detalle = "https://api.football-data.org/v4/competitions/$liga_seleccionada/$tipo_datos";
        $datos_liga = llamarApi($url_detalle, $mi_token, $codigo_detalle);
        
        echo "<p class='ok'>Datos cargados correctamente ($codigo_detalle)</p>";
        
        if ($tipo_datos == 'teams') {
            echo '<table>';
            echo '<tr><th>ID Equipo</th><th>Nombre Equipo</th><th>Nombre Corto</th><th>Ano Fundado</th></tr>';
            foreach ($datos_liga['teams'] ?? [] as $equipo) {
                echo '<tr>';
                echo '<td>' . $equipo['id'] . '</td>';
                echo '<td>' . ($equipo['name']) . '</td>';
                echo '<td>' . ($equipo['shortName'] ?? '-') . '</td>';
                echo '<td>' . ($equipo['founded'] ?? '-') . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            
        } elseif ($tipo_datos == 'standings') {
            if (isset($datos_liga['standings'])) {
                foreach ($datos_liga['standings'] as $grupo) {
                    $nombre_grupo = $grupo['group'] ?? 'Liga General';
                    echo "<h3>Grupo/Clasificacion: $nombre_grupo</h3>";
                    
                    echo '<table>';
                    echo '<tr><th>Posicion</th><th>Equipo</th><th>Partidos</th><th>Ganados</th><th>Empates</th><th>Perdidos</th><th>Goles</th><th>Puntos</th></tr>';
                    
                    foreach ($grupo['table'] ?? [] as $equipo_tabla) {
                        echo '<tr>';
                        echo '<td>' . $equipo_tabla['position'] . '</td>';
                        echo '<td>' . ($equipo_tabla['team']['name']) . '</td>';
                        echo '<td>' . $equipo_tabla['playedGames'] . '</td>';
                        echo '<td>' . $equipo_tabla['won'] . '</td>';
                        echo '<td>' . $equipo_tabla['draw'] . '</td>';
                        echo '<td>' . $equipo_tabla['lost'] . '</td>';
                        echo '<td>' . $equipo_tabla['goalsFor'] . '-' . $equipo_tabla['goalsAgainst'] . '</td>';
                        echo '<td><strong>' . $equipo_tabla['points'] . '</strong></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
            }
            
        } else {
            echo '<table>';
            echo '<tr><th>Fecha</th><th>Equipo Local</th><th>Resultado</th><th>Equipo Visitante</th><th>Estado</th></tr>';
            
            foreach (array_slice($datos_liga['matches'] ?? [], 0, 12) as $partido) {
                $goles_local = $partido['score']['fullTime']['home'] ?? '?';
                $goles_visitante = $partido['score']['fullTime']['away'] ?? '?';
                $estado = $partido['status'];
                
                echo '<tr>';
                echo '<td>' . $partido['utcDate'] . '</td>';
                echo '<td>' . ($partido['homeTeam']['name']) . '</td>';
                echo '<td><strong>' . $goles_local . '-' . $goles_visitante . '</strong></td>';
                echo '<td>' . ($partido['awayTeam']['name']) . '</td>';
                echo '<td>' . $estado . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        
    } catch (Exception $error) {
        echo "<p class='error'>Error con los datos de esta liga: " . $error->getMessage() . "</p>";
    }
}
?>



</body>
</html>