<?php
  if (session_status() == PHP_SESSION_NONE) session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  action="" method="post">
        <label for="">Escribe una línea para el fichero</label>
        <input type="text" name="linea">
        <input type="submit" name="guardar" value="Guardar">
        <input type="submit" name="mostrar" value="Mostrar contenido">
        <input type="submit" name="eliminar" value="Eliminar contenido del fichero">
        
    </form>

    <div>
      <a href="archivo.txt" target="_blank">Descargar</a>
    </div>
    <?php
     

      if(isset($_POST['guardar'])){
        $linea=$_POST['linea']; 
        $file=fopen("archivo.txt","a");
        fwrite($file,$linea . PHP_EOL); 
        echo "<br>";
        fclose($file);
      }

       if(isset($_POST['mostrar'])){
        if(file_exists("archivo.txt")){
        $file = fopen("archivo.txt", "a+");
        while (!feof($file)) {
            $linea = fgets($file);
            echo $linea . "<br />";
    }
        fclose($file);

      }
    }
    else{
      echo "<p>El archivo no existe</p>";
    }

      if(isset($_POST['eliminar'])){
        unlink("archivo.txt");
      }
    ?>
</body>
</html>