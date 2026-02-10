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
      $mayor=0;
     $esconderFormulario=false;
      if(isset($_GET['enviar'])){
        $numero=$_GET['numero'];
        if($numero<0){
            $esconderFormulario=true;
            echo "El total de numeros introducidos es " . count($_SESSION['numeros']) ;
            foreach ($_SESSION['numeros'] as $n) {
                if($n%2==0){
                    $pares[]=$n;
                    $suma+=$n;
                }else{
                    $impares[]=$n;
                }
            }    

            $media=$suma/(count($impares));
            echo "La media de los impares es: $media";
            foreach ($pares as $p) {
                if($mayor<$p){
                    $mayor=$p;
                }               
            }    
            echo "<br>El mayor de los pares es $mayor";    
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