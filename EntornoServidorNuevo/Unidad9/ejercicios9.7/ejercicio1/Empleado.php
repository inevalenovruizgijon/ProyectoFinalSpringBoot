<?php
  class Empleado {
        private $nombre;
  
        private $sueldo;
    
        public function __construct($nombre, $sueldo)
        {
          $this->nombre = $nombre;
          $this->sueldo = $sueldo;
        }



        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        public function getSueldo()
        {
                return $this->sueldo;
        }

        /**
         * @return  self
         */ 
        public function setSueldo($sueldo)
        {
                $this->sueldo = $sueldo;

                return $this;
        }
        public function asigna($nombre,$nuevoSueldo){
              if($nombre==$this->getNombre()){
                  $this->setSueldo($nuevoSueldo);
                  echo "El sueldo ha sido actualizado a $nuevoSueldo";
              }else{
                echo "No se ha encontrado ese nombre";
              }
            }      
              public function pagarImpuestos(){
                if($this->getSueldo()>=3000){
                  echo "El empleado ".$this->getNombre(). " SI debe de pagar impuestos" ;
                }else{
                  echo "El empleado ".$this->getNombre(). " NO debe de pagar impuestos" ;

                }

              }
        
    }
?>