<!-- Creamos la clase factura con el atributo de clase IVA (21) y los atributos de instancia ImporteBase, fecha,
estado (pagada o pendiente) y productos (array con todos los productos de la factura, que contiene el nombre,
precio y cantidad).
Define los métodos AñadeProducto, ImprimeFactura y los getters y setters de los atributos ImporteBase (solo
getter, pues su contenido se actualiza automaticamente), fecha y estado. -->
<?php
    class Factura{
                        public static $iva=21;
                        private $ImporteBase;
                        private $fecha;
                        private $estado;
                        private $productos;
        
        public function __construct($ImporteBase, $fecha, $estado, $productos)
        {
            $this->ImporteBase = $ImporteBase;
            $this->fecha = $fecha;
            $this->estado = $estado;
            $this->productos = [];
        }

                        /**
                         * Get the value of productos
                         */ 
                        public function getProductos()
                        {
                                                return $this->productos;
                        }

                        /**
                         * Set the value of productos
                         *
                         * @return  self
                         */ 
                        public function setProductos($productos)
                        {
                                                $this->productos = $productos;

                                                return $this;
                        }

                        /**
                         * Get the value of estado
                         */ 
                        public function getEstado()
                        {
                                                return $this->estado;
                        }

                        /**
                         * Set the value of estado
                         *
                         * @return  self
                         */ 
                        public function setEstado($estado)
                        {
                                                $this->estado = $estado;

                                                return $this;
                        }

                        /**
                         * Get the value of fecha
                         */ 
                        public function getFecha()
                        {
                                                return $this->fecha;
                        }

                        /**
                         * Set the value of fecha
                         *
                         * @return  self
                         */ 
                        public function setFecha($fecha)
                        {
                                                $this->fecha = $fecha;

                                                return $this;
                        }

                        /**
                         * Get the value of ImporteBase
                         */ 
                        public function getImporteBase()
                        {
                                                return $this->ImporteBase;
                        }

                        /**
                         * Set the value of ImporteBase
                         *
                         * @return  self
                         */ 
                        public function setImporteBase($ImporteBase)
                        {
                                                $this->ImporteBase = $ImporteBase;

                                                return $this;
                        }

                        public function anadirProductos(){

                        }
    }
?>