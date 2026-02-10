<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>Ejercicio 1 Array y ojos</h1>
    <?php
        $pos="";
        $filas=10;
        $columnas=10;
      if(isset($_GET['abierto'])){
        $abierto = explode(" ",$_GET['abierto']);
      }else{
        $abierto=array();
      }

      if(isset($_GET['pos'])){
        $pos=$_GET['pos'];
      }
      if(in_array($pos,$abierto)){
        $nuevo_abierto=array();
        foreach ($abierto as $ab ) {
          if($ab !=$pos){
            $nuevo_abierto[]=$ab;
          }
        }
        $abierto=$nuevo_abierto;
      }else{
        $abierto[]=$pos;
      }
    ?>

      
    <table>
        <?php
          for ($i=0; $i <$filas ; $i++) { 
            echo "<tr>";
            for ($j=0; $j < $columnas; $j++) { 
                $pos=$i*$columnas+$j;
                $imagen=in_array($pos,$abierto) ? "lagoftalmos.jpg" : "istockphoto-1369045302-612x612.jpg";
                $cadena=implode(" ",$abierto);
                echo "<td><a href='?pos=$pos&abierto=$cadena'><img src='$imagen' width=40px></a></td>";
            }
            echo "</tr>";
          }  
        ?>
    </table>
</body>
</html>