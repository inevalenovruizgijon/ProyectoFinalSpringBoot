<!-- Escribe un programa que calcule la media de un conjunto de números positivos introducidos por teclado. A
priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha terminado de introducir
los datos cuando meta un número negativo. Utiliza sesiones. -->
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
    <?php
      if(isset($_GET['adios'])){
          session_destroy();
      }
      if(!isset($_SESSION['numeros'])){
        $_SESSION['numeros']=[];
        
      }
      $suma=0;
      $media=0;
     $esconderFormulario=false;

      if(isset($_GET['enviar'])){
        $numero=$_GET['numero'];
        if($numero<0){
            $esconderFormulario=true;
            foreach ($_SESSION['numeros'] as $n) {
                $suma+=$n;
            }
            $media=$suma/(count($_SESSION['numeros']));
            echo "La media es $media <br>" ;
            echo "Los numeros son: ". implode(" ", $_SESSION['numeros']);
            ?>
            <form action="" method="get">
                <button type="submit" name="adios">Destruir sesion</button>
            </form>
            <?php
        }else{
            $_SESSION['numeros'][]=$numero;
      }
    }   

    if(!$esconderFormulario){
    ?>
    
    <form action="#" method="get">
        <label for="">Introduce numeros y cuando introduzcas un numero negativo, parará</label>
        <input type="number" name="numero">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    }  
    ?>
</body>
</html>