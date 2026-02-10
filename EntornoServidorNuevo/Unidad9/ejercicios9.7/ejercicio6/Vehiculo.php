<?php

class Vehiculo {
    public $kmRecorridos = 0;
    
    public static $vehiculosCreados = 0;
    public static $kmTotales = 0;

    public function __construct() {
    }

    public function getKmRecorridos() {
        echo "Km recorridos: " . $this->kmRecorridos . "<br>";
    }

    public function recorre($km, &$kmTotales) {
        $this->kmRecorridos += $km;
        $kmTotales += $km;
        echo "Recorriendo " . $km . " km<br>";
    }
}

class Bicicleta extends Vehiculo {
    public function hacerCaballito() {
        echo "La bicicleta está haciendo el caballito.<br>";
    }
}

class Coche extends Vehiculo {
    public function quemarRueda() {
        echo "El coche está quemando rueda.<br>";
    }
}