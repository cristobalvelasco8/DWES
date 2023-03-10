<?php
require_once 'Animal.php';
abstract class Mamifero extends Animal{
    protected $tipo;
    protected $habitat;
    
    public function __construct($vivo, $alimentacion, $edad, $tipo, $habitat) {
        parent::__construct($vivo, $alimentacion, $edad);
        $this->tipo = $tipo;
        $this->habitat = $habitat;
    }

    public function __toString() {
        return parent::__toString(). "Como soy Mamífero, soy ". $this->tipo ." y mi hábitat natural es ". $this->habitat .".<br>";
    }

    /**
     * Getters & setters
     */
    public function getTipo() {
        return $this->tipo;
    }

    public function getHabitat() {
        return $this->habitat;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setHabitat($habitat): void {
        $this->habitat = $habitat;
    }

}