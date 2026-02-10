<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mi App del Tiempo - OpenWeatherMap</title>
    
</head>
<body>
    <h1>App del Tiempo</h1>
    
    <div class="form-buscar">
        <form method="GET">
            <input type="text" name="ciudad" placeholder="Escribe una ciudad (ej: Motril, Sevilla, London)" 
                   value="<?php echo ($_GET['ciudad'] ?? ''); ?>" required>
            <button type="submit">Buscar Tiempo</button>
        </form>
        <p >
            Ejemplos: Motril, Sevilla, Madrid, London, New York
        </p>
    </div>

<?php
if (isset($_GET['ciudad']) && !empty($_GET['ciudad'])) {
    $mi_token = '3a972e3f5c51107c718644e755d2774a';  
    $ciudad = trim($_GET['ciudad']);
    
    $url_geo = "http://api.openweathermap.org/geo/1.0/direct?q=" . urlencode($ciudad) . "&limit=1&appid=" . $mi_token;
    
    $contexto_geo = stream_context_create([
        'http' => ['method' => 'GET']
    ]);
    $json_geo = @file_get_contents($url_geo, false, $contexto_geo);
    
    if ($json_geo === false || json_decode($json_geo, true) === null) {
        echo "<div>No encuentro la ciudad '$ciudad'. Verifica el nombre o tu API key.</div>";
    } else {
        $geo_data = json_decode($json_geo, true);
        if (empty($geo_data)) {
            echo "<div>No hay datos para '$ciudad'. Prueba otra ciudad.</div>";
        } else {
            $lat = $geo_data[0]['lat'];
            $lon = $geo_data[0]['lon'];
            $nombre_ciudad = $geo_data[0]['name'] . ', ' . $geo_data[0]['country'];
            
            $url_tiempo = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=" . $mi_token . "&units=metric&lang=es";
            
            $json_tiempo = @file_get_contents($url_tiempo, false, $contexto_geo);
            $tiempo_data = json_decode($json_tiempo, true);
            
            if (!$tiempo_data || isset($tiempo_data['cod']) && $tiempo_data['cod'] != 200) {
                echo "<div>Error del tiempo: " . ($tiempo_data['message'] ?? 'Desconocido') . "</div>";
            } else {
                $temp_actual = round($tiempo_data['main']['temp']);
                $sensacion = round($tiempo_data['main']['feels_like']);
                $humedad = $tiempo_data['main']['humidity'];
                $presion = $tiempo_data['main']['pressure'];
                $viento = round($tiempo_data['wind']['speed'] * 3.6); 
                $visibilidad = $tiempo_data['visibility'] / 1000 ?? 0; 
                $nubes = $tiempo_data['clouds']['all'];
                $descripcion = ucfirst($tiempo_data['weather'][0]['description']);
                $icono = $tiempo_data['weather'][0]['icon'];
                $amanecer = date('H:i', $tiempo_data['sys']['sunrise']);
                $atardecer = date('H:i', $tiempo_data['sys']['sunset']);
                
                echo "<img src='https://openweathermap.org/img/wn/$icono@4x.png' alt='$descripcion' class='icono-tiempo'>";
                echo "<p>$nombre_ciudad</p>";
                echo "<h2 >$temp_actual°</h2>";
                echo "<p>$descripcion</p>";
                
                echo "<span>$sensacion°</span><br><span>Sensación térmica</span>";
                echo "<span>$humedad%</span><br><span>Humedad</span>";
                echo "<span>$viento km/h</span><br><span>Viento</span>";
                echo "<span>$presion hPa</span><br><span>Presión</span>";
                echo "<span>$visibilidad km</span><br><span >Visibilidad</span>";
                echo "<span>$nubes%</span><br><span >Nubes</span>";
                echo "<span>$amanecer</span><br><span >Amanecer</span>";
                echo "<span>$atardecer</span><br><span >Atardecer</span>";
            }
        }
    }
}
?>
</body>
</html>