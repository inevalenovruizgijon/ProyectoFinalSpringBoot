<?php
  function combinacion($numeros){
    for ($i=0; $i < 7; $i++) { 
        if($numeros[$i]==""){
            if($i<6){
              $numeros[$i]=rand(1,49);
            }else{
              $numeros[$i]=rand(1,999);
            }
        }
    }

    return $numeros;
  }
  
  function imprimirApuesta($numeros,$texto){
    $cadena=implode(" " ,$numeros);
    if($texto==""){
      $texto="Combinación generada para la primitiva";
    }
    $tabla='
    <table border="1">
      <tr><th>'.$texto.'</th></tr>
      <tr><th>'.$cadena.'</th></tr>
    </table>
    ';
    return $tabla;   
  }
?>