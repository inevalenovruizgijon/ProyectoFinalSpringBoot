<?php
require_once "../Model/Producto.php";

function mostrarEstado($codEstado, $mensaje)
{
    echo "STATUS: " . $codEstado;
    echo "<br>" . $mensaje;
}

function setCabecera($codEstado, $mensaje) {   
  header("HTTP/1.1 $codEstado $mensaje");   
  header("Content-Type: application/json;charset=utf-8");   
}

function mostrarDatos($url, $parametros) { 
    $data = @file_get_contents($url . $parametros); 
    $respuesta = json_decode($data); 
    
    // Verificamos si hay respuesta antes de procesar
    if (!isset($http_response_header)) {
        echo "<p class='error'>Error: No se pudo conectar con el servicio.</p>";
        return;
    }

    $codEstado = substr($http_response_header[0], 9, 3); 
    $mensaje = substr($http_response_header[0], 13); 

    if ($codEstado == 200 && is_array($respuesta)) { 
        echo "<div class='table-container'>";
        echo "<table class='tabla-productos'>";
        echo "<thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock (Imagen)</th>
                </tr>
              </thead>";
        echo "<tbody>";
        
        foreach ($respuesta as $producto) { 
            echo "<tr class='fila-datos'>";
            echo "<td>" . $producto->Nombre . "</td>";
            echo "<td class='precio'>" . $producto->Precio . "€</td>";
            echo "<td>" . $producto->Imagen . "</td>"; 
            echo "</tr>"; 
        } 
        
        echo "</tbody></table>";
        echo "</div>";
    } else { 
        mostrarEstado($codEstado, $mensaje); 
    } 
    
    echo "<div class='footer-nav'>";
    echo "<a href='../Controller/index.php' class='btn-volver'>VOLVER A LA PÁGINA DE CONSULTAS</a>"; 
    echo "</div>";
}