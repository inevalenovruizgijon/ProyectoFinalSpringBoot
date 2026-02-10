<?php
  function dameTarjeta($perfil) {
    $matriz = [];
    if ($perfil == "admin") {
        $inicio = 0; 
    } else {
        $inicio = 25; 
    }

    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++) {
            $matriz[$i][$j] = $inicio;
            $inicio++;
        }
    }

    return $matriz;
}

  function compruebaClave($matriz,$coordenadas,$valor){
    $letras = ['A'=>0, 'B'=>1, 'C'=>2, 'D'=>3, 'E'=>4];
    $fila=$coordenadas[0];
    $col=$coordenadas[1];

    $i=$letras[$fila];
    $j=$col-1;


    if($matriz[$i][$j]==$valor){
        return true;
    }else{
        return false;
    }
  }


?>