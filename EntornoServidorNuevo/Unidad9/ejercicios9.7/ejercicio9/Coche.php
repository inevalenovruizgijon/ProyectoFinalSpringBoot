<?php
class Coche {
    private $matricula;
    private $modelo;
    private $precio;

    public function __construct($matricula, $modelo, $precio) {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->precio = $precio;
    }

    public function getMatricula() {
        return $this->matricula;
    }
    public function getModelo() {
        return $this->modelo;
    }
    public function getPrecio() {
        return $this->precio;
    }

    public function toString() {
        return "<tr><td>" . $this->matricula . "</td><td>" . $this->modelo . "</td><td>" . number_format($this->getPrecio(),2) . "</td><td>No procede</td></tr>";
    }
}
?>