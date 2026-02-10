<?php
class Zona {
    public $nombre;
    public $entradasDisponibles;
    public $precio;
    public $ingresoTotal;

    public function __construct($nombre, $entradas, $precio) {
        $this->nombre = $nombre;
        $this->entradasDisponibles = $entradas;
        $this->precio = $precio;
        $this->ingresoTotal = 0;
    }

    public function venderEntradas($cantidad) {
        if ($cantidad <= 0) {
            return "Cantidad no válida.";
        }
        if ($cantidad > $this->entradasDisponibles) {
            return "No hay suficientes entradas disponibles en la zona {$this->nombre}. Solo quedan {$this->entradasDisponibles}.";
        }
        $this->entradasDisponibles -= $cantidad;
        $this->ingresoTotal += $cantidad * $this->precio;
        return "Vendidas $cantidad entradas en la zona {$this->nombre}.";
    }

    public function mostrarInfo() {
        return "Zona {$this->nombre}: Precio = {$this->precio}€, Entradas disponibles = {$this->entradasDisponibles}";
    }
}
?>