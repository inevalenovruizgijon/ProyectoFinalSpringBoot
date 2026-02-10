<?php
  class DadoPoker {
    public $figuras = ["As", "K", "Q", "J", "7", "8"];
    public $ultimaFigura = "";
}

$tiradasTotales = 0;

function tirarDado(&$dado, &$tiradasTotales) {
    $indice = rand(0, 5);
    $dado->ultimaFigura = $dado->figuras[$indice];
    $tiradasTotales++;
    echo "Dado tirado: " . $dado->ultimaFigura . "<br>";
}

function mostrarFigura($dado) {
    echo "Última figura: " . $dado->ultimaFigura . "<br>";
}

$dado = new DadoPoker();
tirarDado($dado, $tiradasTotales);
mostrarFigura($dado);
echo "Tiradas totales: " . $tiradasTotales . "<br>";

?>  