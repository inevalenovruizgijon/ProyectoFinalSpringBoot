<?php
    
class CocheLujo extends Coche {
    private $suplemento;

    public function __construct($matricula, $modelo, $precio, $suplemento) {
        parent::__construct($matricula, $modelo, $precio);
        $this->suplemento = $suplemento;
    }

    public function getPrecioBase() {
        return parent::getPrecio();
    }

    public function getPrecio() {
        return parent::getPrecio() + $this->suplemento;
    }

    public function getSuplemento() {
        return $this->suplemento;
    }

    public function toString() {
        return "<tr><td>" . $this->getMatricula() . "</td><td>" . $this->getModelo() . "</td><td>" . number_format($this->getPrecio(),2) . "</td><td>" . number_format($this->suplemento,2) . "</td></tr>";
    }
}
?>