<?php
  function esCapicua($numero){
    $cadena=(String)$numero;
    $inverso=strrev($cadena);
    if($cadena==$inverso){
      return true;
    }else{
      return false;
    }      
    
  }  

  function esPrimo($numero){
    $esPrimo=true;
    for ($i=2; $i <$numero ; $i++) { 
      if($numero%$i){
        return false;
      }
    }return $esPrimo;
  }
     

  function siguientePrimo($numero) {
    $numero++;
    while (!esPrimo($numero)) {
        $numero++;
    }
    return $numero;
}

  function potencia($base,$exponente){
    $resultado=0;
    for ($i=0; $i <$exponente ; $i++) { 
      $resultado*=$base;
    }
    return $resultado;
  }

  function voltea($numero){
    $numeroString=(String)$numero;
    $stringInverso=strrev($numeroString);
    return $stringInverso;
  }

  function digitos($numero){
    $cadena=(string)$numero;
    return strlen($cadena);
  }

  function digitoN($numero,$n){
    $cadena=(String)$numero;
      if(strlen($cadena)<$n || 0>$n){
        return null;
      }
      else{
        return $cadena[$n];
      }
  }

  function posicionDigito($numero,$n){
    $cadena=(String)$numero;
    for ($i=0; $i <strlen($cadena) ; $i++) { 
      if($cadena[$i]===$n){
        return $i;
      }
      
    }
    return -1;
  }
  function quitarDestras($numero,$n){
    $cadena=(string)$numero;
  }
?>