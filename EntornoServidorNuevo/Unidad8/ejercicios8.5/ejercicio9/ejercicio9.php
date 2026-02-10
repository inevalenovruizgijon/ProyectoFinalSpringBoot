<!-- Ejercicio 9.
Escribe un programa que guarde en un fichero el contenido de otros dos ficheros, de tal forma que en el fichero
resultante aparezcan las líneas de los primeros dos ficheros mezcladas, es decir, la primera línea será del primer
fichero, la segunda será del segundo fichero, la tercera será la siguiente del primer fichero, etc. Los nombres de los
dos ficheros origen y el nombre del fichero destino se deben pasar a través de un formulario. Hay que tener en
cuenta que los ficheros de donde se van cogiendo las líneas pueden tener tamaños diferentes.
También que ese archivo nuevo creado, se suba. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="post">
        <input type="file" name="fichero1">
        <input type="file" name="fichero2">
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php 
    if(isset($_POST['enviar'])){
        $fichero1=fopen($_POST['fichero1'],"+a");
        $fichero2=fopen($_POST['fichero2'],"+a");
        }
        while (feof($fichero1) && feof($fichero2)) {
            $linea1=fgets($fichero1); 
            $linea2=fgets($fichero2);
            echo "$linea1";
            echo "$linea2";
        }

    ?>
</body>
</html>