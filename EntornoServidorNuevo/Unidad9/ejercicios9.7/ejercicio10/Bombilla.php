<?php
  class Bombilla {
    private $encendida;
    private $potencia;
    private $ubicacion;

    private $estadoAntesFusible; 

    public function __construct($ubicacion, $potencia) {
        $this->ubicacion = $ubicacion;
        $this->potencia = $potencia;
        $this->encendida = false;
        $this->estadoAntesFusible = false;
    }

    public function estaEncendida() {
        return $this->encendida;
    }

    public function getPotencia() {
        return $this->potencia;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function encender() {
        $this->encendida = true;
        $this->estadoAntesFusible = true;
    }

    public function apagar() {
        $this->encendida = false;
        $this->estadoAntesFusible = false;
    }

    public function guardarEstadoAntesFusible() {
        $this->estadoAntesFusible = $this->encendida;
    }

    public function restaurarEstadoDespuesFusible() {
        $this->encendida = $this->estadoAntesFusible;
    }
}  
?>