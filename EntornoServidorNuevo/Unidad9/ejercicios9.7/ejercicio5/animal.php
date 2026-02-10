<!-- Crea las clases Animal, Mamifero, Ave, Gato, Perro, Canario, Pinguino y Lagarto. Crea, al menos, tres
métodos específicos de cada clase y redefine el/los método/s cuando sea necesario. Prueba las clases en un
programa en el que se instancien objetos y se les apliquen métodos. Puedes aprovechar las capacidades que
proporciona HTML y CSS para incluir imágenes, sonidos, animaciones, etc. para representar acciones de
objetos; por ejemplo, si el canario canta, el perro ladra, o el ave vuela. -->
<?php
  class Animal{
  
      protected $nombre;
  
      public function __construct($nombre)
      {
          $this->nombre = $nombre;
      }
  
      public function mover(){
          echo "El animal se mueve <br>";
      }
      public function comer(){
          echo "El animal come <br>";
      }
      public function dormir(){
          echo "El animal duerme";
      }
    }

  class Mamifero extends Animal{
    public function amamantar(){
        echo "{$this->nombre} está amamantando a sus crias";
    }
    public function caminar(){
      echo "{$this->nombre} está caminando";
    }
    public function emitirSonido(){
      echo "{$this->nombre} está emitiendo sonido";
    }

  }

  class Ave extends Animal{
    public function volar(){
      echo "{$this->nombre} vuela";
    }

    public function ponerHuevos(){
      echo "{$this->nombre} pone huevos";
    }

    public function emitirSonido (){
      echo "{$this->nombre} está emitiendo sonido";
    }


  }
  class Gato extends Mamifero{
    public function ronronear(){
      echo "{$this->nombre} ronronea";
    }

    public function cazar (){
      echo "{$this->nombre} está cazando un ratón";
    }

    public function jugar (){
      echo "{$this->nombre} está jugando con su dueño";
    }
  }

  class Canario extends Ave{
    public function emitirSonido() {
        return "{$this->nombre} está cantando.";
    }

    public function construirNido() {
        return "{$this->nombre} está construyendo un nido.";
    }

    public function volar() {
        return "{$this->nombre} está volando alegremente.";
    }
  }
  class Pinguino extends Ave {
    public function hacerSonido() {
        return "El pingüino hace un sonido característico.";
    }
    public function nadar() {
        return "El pingüino está nadando.";
    }
    public function caminarSobreHielo() {
        return "El pingüino está caminando sobre hielo.";
    }
}

class Lagarto extends Animal {
    public function cambiarColor() {
        return "El lagarto está cambiando de color.";
    }
    public function tomarSol() {
        return "El lagarto está tomando el sol.";
    }
    public function correr() {
        return "El lagarto está corriendo.";
    }
}
?>