<?php

use Soap\Url;

  if (session_status() == PHP_SESSION_NONE) session_start();
  
  if(isset($_SESSION['colores']) && !empty($_SESSION['colores'])){
    $colores=$_SESSION['colores'];
  }else{
    $colores=[];
  }
  if(isset($_POST['colorNuevo'])){
    $colorNuevo=$_POST['colorNuevo'];
  }
  if(isset($_POST['destruir'])){
    session_destroy();
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($colorNuevo);?>;">
    <table>
        <?php
        $filasMaxima=5;
        $contador=0;
        echo "<tr>";
        if(count($colores)>0){     
          foreach ($colores as $c) {
            ?> <td>
                    <form action="" method="post">
                        <button type="submit" name="colorNuevo" value="<?php echo $c ?>" style="width: 50px; height: 50px; background-color: <?php echo $c ?>;"></button>
                    </form>    
                </td>
                
                <?php
                
            $contador++;
            if($contador% $filasMaxima==0){
                echo "</tr><tr>";
            }
          }
        }
        ?></tr>
    </table>
    <form action="index.php" method="post">
        <input type="submit" name="volver" value="Volver atrás">
    </form>
    <form action="" method="post">
        <input type="submit" name="destruir" value="Destruir Sesión">
    </form>
</body>
</html>