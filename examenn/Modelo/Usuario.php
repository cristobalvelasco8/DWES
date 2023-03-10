<?php

class Usuario{
    private $nombre;
    private $direccion;
    private $telefono;
    private $dni;
    private $clave;
    
    public function __construct($nombre="", $direccion="", $telefono="", $dni="", $clave="") {
        $this->nombre=$nombre;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->dni=$dni;
        $this->clave=$clave;
    }
    
     public function __get($name) {
        return $this->$name;
    }
    
     public function __set($name, $value) {
        $this->$name=$value;
    }
    
    public function __toString() {
        return "Dni:" . $this->dni . " nombre: ".$this->nombre;
    }
    
}

?>
