<?php
require_once '../Model/Alumno.php'; 
require_once '../Model/Asignatura.php'; 
require_once '../Model/Alumno_Asignatura.php'; 

function mostrarEstado($codEstado, $mensaje) {
    // Determinamos si es un error o un éxito para el color del icono
    $claseEstado = ($codEstado >= 200 && $codEstado < 300) ? 'estado-ok' : 'estado-error';
    
    echo "<div class='container-mensaje'>";
    echo "  <div class='card-estado $claseEstado'>";
    echo "      <div class='codigo'>$codEstado</div>";
    echo "      <div class='mensaje'>$mensaje</div>";
    echo "      <div class='center'><a href='../Client/index.php' class='btn-nav'>VOLVER A LA PÁGINA DE CONSULTAS</a></div>"; 
    echo "  </div>";
    echo "</div>";
}

function mostrarDatosAlumnos($url, $parametros) { 
    $data = @file_get_contents($url . $parametros); 
    $respuesta = json_decode($data); 
    
    if (!isset($http_response_header)) {
        mostrarEstado(500, "No se pudo conectar con el servicio");
        return;
    }

    $codEstado = substr($http_response_header[0], 9, 3); 
    $mensaje = substr($http_response_header[0], 13); 

    if ($codEstado == 200 && is_array($respuesta)) { 
        echo "<div class='table-container'>";
        echo "<table class='tabla-api'>";
        echo "<thead><tr><th>Matricula</th><th>Nombre</th><th>Apellidos</th><th>Curso</th></tr></thead>";
        echo "<tbody>";
        foreach ($respuesta as $alumno) { 
            echo "<tr>";
            echo "<td>" . htmlspecialchars($alumno->Matricula) . "</td>"; 
            echo "<td>" . htmlspecialchars($alumno->Nombre) . "</td>"; 
            echo "<td>" . htmlspecialchars($alumno->Apellido) . "</td>"; 
            echo "<td><span class='badge-curso'>" . htmlspecialchars($alumno->Curso) . "</span></td>"; 
            echo "</tr>"; 
        } 
        echo "</tbody></table>";
        echo "</div>";
    } else { 
        mostrarEstado($codEstado, $mensaje); 
    } 
} 

function mostrarDatosAsignaturas($url, $parametros) { 
    $data = @file_get_contents($url . $parametros); 
    $respuesta = json_decode($data); 
    
    $codEstado = substr($http_response_header[0], 9, 3); 
    $mensaje = substr($http_response_header[0], 13); 

    if ($codEstado == 200 && is_array($respuesta)) { 
        echo "<div class='table-container'>";
        echo "<table class='tabla-api'>";
        echo "<thead><tr><th>Código</th><th>Nombre de Asignatura</th></tr></thead>";
        echo "<tbody>";
        foreach ($respuesta as $asignatura) { 
            echo "<tr>";
            echo "<td class='bold'>" . htmlspecialchars($asignatura->Codigo) . "</td>"; 
            echo "<td>" . htmlspecialchars($asignatura->Nombre) . "</td>"; 
            echo "</tr>"; 
        } 
        echo "</tbody></table>";
        echo "</div>";
    } else { 
        mostrarEstado($codEstado, $mensaje); 
    } 
}
 
function pideServicio ($url, $datos, $metodo){ 
    $opciones = [ 
        "http" => [ 
            "header" => "Content-type: application/x-www-form-urlencoded\r\n", 
            "method" => $metodo, 
            "content" => http_build_query($datos) 
        ], 
    ]; 
    $contexto = stream_context_create($opciones); 
    @file_get_contents($url, false, $contexto); 
    $codEstado=substr($http_response_header[0],9,3); 
    $mensaje=substr($http_response_header[0],13); 
    mostrarEstado($codEstado, $mensaje); 
}

function setCabecera($codEstado, $mensaje) {   
  header("HTTP/1.1 $codEstado $mensaje");   
  header("Content-Type: application/json;charset=utf-8");   
}