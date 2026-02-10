<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $matriz=[];
    $relleno=0;
    $columna=[1,2,3,4,5];
    $fila=["A","B","C","D","E"];
    include "funciones2.php";
    if(isset($_GET['boton'])){
        $perfil=$_GET['perfil'];
        $codigo=$_GET['codigo'];
        $coordenadas=$_GET['coordenadas'];
        compruebaClave(dameTarjeta($perfil),$coordenadas,$codigo);
        if((compruebaClave(dameTarjeta($perfil),$coordenadas,$codigo))==true){
        
            header('Location: https://www.youtube.com/');
        }else{
            
            header('Location: ejercicio2.php');
        }
    }else{
    echo '<table>';
    echo '<tr ><th colspan="6">Administrador</th></tr>';
    echo "<tr></tr>";
    echo "<th></th>";
    foreach ($columna as $col) {
        echo "<th>$col</th>";
        
    }
    for ($i=0; $i <5 ; $i++) { 
    echo "<tr> ";;
    echo "<td>".$fila[$i]."</td>";
        for ($j=1; $j <6 ; $j++) {
            
        $matriz[$i][$j]=$relleno;
        $relleno++;     
        echo '<td style="border: 1px solid black">'.$matriz[$i][$j].'</td>';
        
        }    
        echo "</tr>";
    
    }

    echo "</table>";
     echo '<table>';
    echo '<tr ><th colspan="6">Estandar</th></tr>';
    echo "<tr></tr>";
    echo "<th></th>";
    foreach ($columna as $col) {
        echo "<th>$col</th>";
        
    }
    for ($i=0; $i <5 ; $i++) { 
    echo "<tr> ";;
    echo "<td>".$fila[$i]."</td>";
        for ($j=1; $j <6 ; $j++) {
            
        $matriz[$i][$j]=$relleno;
        $relleno++;     
        echo '<td style="border: 1px solid black">'.$matriz[$i][$j].'</td>';
        
        }    
        echo "</tr>";
    
    }

    echo "</table>";
    $rand1=rand(0,4);
    $rand2=rand(0,4);
    ?>
    <br>
    <form action="#" method="get">
        <label for="">Usted es:</label>
        <select name="perfil" id="">
            <option value="admin" name="admin">Administrador</option>
            <option value="estandar" name="estandar">Estandar</option>
        </select>
        <br>
        <?php
          $coor1=$fila[$rand1];  
          $coor2=$columna[$rand2];  
          $coordenadas=$coor1.$coor2;
        ?>
        <label for="">Debe introducir la posicion <?php echo $coor1 . $coor2; ?></label><br>
        <label for="">Introduce el codigo</label>
        <input type="text" name="codigo">
        <input type="hidden" value="<?php echo  $coordenadas;?>" name="coordenadas">
        <br>
        <input type="submit" value="Enviar" name="boton">
    </form>
    <?php  
    }
    ?>
        
</body>
</html>