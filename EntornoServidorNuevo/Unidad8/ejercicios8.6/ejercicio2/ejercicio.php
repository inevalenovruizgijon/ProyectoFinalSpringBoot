<?php
  if (session_status() == PHP_SESSION_NONE) session_start();  
    $nombreFichero="../archivos/animales.txt";
    $fechasDisponibles=[];
    $lineasFichero=[];
    $fichero=fopen($nombreFichero,"r");
    while(!feof($fichero)){
        $fila=trim(fgets($fichero));
        $lineasFichero[]=$fila;
        if(str_contains($fila,"#")){
            $fechasDisponibles[]=$fila;
        }

    }
    fclose($fichero);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <select name="fecha" id="">
            <?php 
            foreach ($fechasDisponibles as $f) {
                echo "<option>$f</option>";
            }
            ?>
        </select>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
      if(isset($_POST['enviar'])){
        $_SESSION['mascotas']=[];
        $fecha=$_POST['fecha'];
        $fechaSeleccionada=false;
        foreach ($lineasFichero as $linea) {
                
                if (str_contains($linea, '#')) {
                    if ($linea == $fecha) {
                        $fechaEncontrada = true; 
                    } else {
                        $fechaEncontrada = false; 
                    }
                    continue; 
                }

                if ($fechaEncontrada) {
                    $datos = explode("-", $linea);
                    if (count($datos) === 3) {
                        $_SESSION['mascotas'][] = [
                            "nombre" => $datos[0],
                            "animal" => $datos[1],
                            "edad"   => $datos[2],
                        ];
                    }
                }
            }

        }

      if(!empty($_SESSION['mascotas'])){
        ?>
        <h3>Mascotas encontradas:</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Animal</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['mascotas'] as $mascota){ ?>
                    <tr>
                        <td><?php echo ($mascota['nombre']); ?></td>
                        <td><?php echo ($mascota['animal']); ?></td>
                        <td><?php echo ($mascota['edad']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
      }

    ?>
</body>
</html>