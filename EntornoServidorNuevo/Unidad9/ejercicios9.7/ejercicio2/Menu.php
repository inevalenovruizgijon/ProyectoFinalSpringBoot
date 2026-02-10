<!-- Ejercicio 2
Confeccionar una clase Menu, con los atributos titulo y enlace (ambos son arrays). Crear los métodos
necesarios que permitan añadir elementos al menú. Crear los métodos que permitan mostrar el menú en forma
horizontal o vertical (según que método llamemos) -->
<?php
    class Menu{
                private $titulos=[];
    
                private $enlaces=[];
        
            public function __construct($titulos,$enlaces)
            {
                $this->titulos=[];
                $this->enlaces=[];
            }
            
            
               


                /**
                 * Get the value of enlace
                 */ 
                public function getEnlace()
                {
                                return $this->enlaces;
                }

                /**
                 * Set the value of enlace
                 *
                 * @return  self
                 */ 
                public function setEnlace($enlace)
                {
                                $this->enlaces = $enlace;

                                return $this;
                }

                /**
                 * Get the value of titulo
                 */ 
                public function getTitulo()
                {
                                return $this->titulos;
                }

                /**
                 * Set the value of titulo
                 *
                 * @return  self
                 */ 
                public function setTitulo($titulo)
                {
                                $this->titulos = $titulo;

                                return $this;
                }

                public function crearMenu($modo) {
                    if ($modo == "horizontal") {
                        for ($i = 0; $i < count($this->enlaces); $i++) {
                            echo '<a href="' . ($this->enlaces[$i]) . '">' . ($this->titulos[$i]) . '</a>&ensp;';
                        }
                        echo "<br>";
                    }
                    if ($modo == "vertical") {
                        for ($i = 0; $i < count($this->enlaces); $i++) {
                            echo '<a href="' .($this->enlaces[$i]) . '">' . ($this->titulos[$i]) . '</a><br>';
                        }
                    }
                }
               public function anadirElemento($titulo, $enlace) {
                    $this->titulos[] = $titulo;
                    $this->enlaces[] = $enlace;
    }
        }
?>