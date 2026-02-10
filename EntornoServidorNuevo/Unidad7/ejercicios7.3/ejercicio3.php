<?php
  if (session_status() == PHP_SESSION_NONE) session_start();  
?>
<!DOCTYPE html>
<!-- Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras su suma no
supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado, el contador de los
números introducidos y la media. Utiliza sesiones. -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $suma=0;
    if(isset($_POST['adios']) || isset($_POST['destruir'])){
        session_destroy();
        header("refresh:0;");
    }
        
    if(!isset($_SESSION['numeros'])){
            $_SESSION['numeros']=[];
        }
        
    if(isset($_POST['enviar'])){
        $numero=($_POST['numero']);
        $_SESSION['numeros'][]=$numero;
      }
    foreach ($_SESSION['numeros'] as $n) {
        $suma+=$n;
    }
      
    if($suma<10000){
    ?>

    <form action="" method="post">
        <label for="">Introduce numeros y cuando supere el valor de 10.000, parará</label>
        <input type="number" name="numero">
        <input type="submit" name="enviar" value="Enviar">
        <input type="submit" value="Destruir sesion" name="adios">
    </form>

    <?php
        }else{  
            echo "El valor total es : $suma <br>";      
            echo "Contador : " . count($_SESSION['numeros']);
            echo "<br>La media es : " . $suma/count($_SESSION['numeros']);
            ?>
            <form action="" method="post">
                <input type="submit" value="Destruir sesion" name="destruir">
            </form>
            <?php
        }     
    ?>
</body>
</html>