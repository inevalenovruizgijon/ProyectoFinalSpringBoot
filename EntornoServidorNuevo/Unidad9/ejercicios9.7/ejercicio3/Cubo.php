<!-- Crear una clase cubo que contenga información sobre la capacidad y su contenido actual en litros. Se podrá
consultar tanto la capacidad como el contenido en cualquier momento. Dotar a la clase de la capacidad de verter
el contenido de un cubo en otro (hay que tener en cuenta si el contenido del cubo origen cabe en el cubo destino,
si no cabe, se verterá solo el contenido que quepa). Hacer una página principal para probar el funcionamiento
con un par de cubos. -->

<?php
  class Cubo{
        private $capacidad;
        private $contenidoActual;
        
        public function __construct($capacidad, $contenidoActual)
        {
            $this->capacidad = $capacidad;
          $this->contenidoActual = $contenidoActual;
        }

        /**
         * Get the value of contenidoActual
         */ 
        public function getContenidoActual()
        {
                return $this->contenidoActual;
        }

        /**
         * Set the value of contenidoActual
         *
         * @return  self
         */ 
        public function setContenidoActual($contenidoActual)
        {
                $this->contenidoActual = $contenidoActual;

                return $this;
        }

        /**
         * Get the value of capacidad
         */ 
        public function getCapacidad()
        {
                return $this->capacidad;
        }

        /**
         * Set the value of capacidad
         *
         * @return  self
         */ 
        public function setCapacidad($capacidad)
        {
                $this->capacidad = $capacidad;

                return $this;
        }
        public function crearCubo($capacidad,$contenidoActual){
            $this->$capacidad=$capacidad;
            $this->$contenidoActual=$contenidoActual;
      }

    public function verter(Cubo $destino) {
        $espacioDisponible = $destino->getCapacidad() - $destino->getContenidoActual();
        $contenidoOrigen = $this->getContenidoActual();

        if ($espacioDisponible <= 0) {
            echo "<p>El cubo destino está lleno, no se puede verter contenido.</p>";
        }

        if ($contenidoOrigen <= $espacioDisponible) {
            $destino->setContenidoActual($destino->getContenidoActual() + $contenidoOrigen);
            $this->setContenidoActual(0);

            echo "<p>Ha sido vertido $contenidoOrigen litros.</p>";
            echo "<p>El cubo destino tiene ahora " . $destino->getContenidoActual() . " litros.</p>";
            echo "<p>El cubo origen está vacío.</p>";
        } else {
            $destino->setContenidoActual($destino->getCapacidad());
            $this->setContenidoActual($contenidoOrigen - $espacioDisponible);

            echo "<p>El contenido vertido ha sido $espacioDisponible litros.</p>";
            echo "<p>El cubo destino está lleno con " . $destino->getContenidoActual() . " litros.</p>";
            echo "<p>El cubo origen tiene ahora " . $this->getContenidoActual() . " litros.</p>";
        }
    }
}



      
?>