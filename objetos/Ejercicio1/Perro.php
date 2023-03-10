<?php
require_once 'Mamifero.php';
class Perro extends Mamifero {
    protected $ladra;
    protected $raza;
    
    public function __construct($vivo, $alimentacion, $edad, $tipo, $habitat, $ladra, $raza) {
        parent::__construct($vivo, $alimentacion, $edad, $tipo, $habitat);
        $this->ladra = $ladra;
        $this->raza = $raza;
    }

    public function __toString() {
        return parent::__toString(). "Soy un perro, mi raza es ". $this->raza . " y " . $this->ladra. " ladro.<br>";
    }
    
    public function ladra() {
        if ($this->ladra == "si") {
            echo '<br>GUAU GUAUUU';
        } else {
            echo "<br>Yo no ladro";
        }
    }
    
    public function correrTrasLaLiebre() {
        echo "<br>Ahí va la liebreeeee GUAUUUU";
    }
    
    public function daLaPata() {
        echo '<br>Auuuuuuu NOOO';
    }

    /**
     * Getters & setters
     * @return type
     */
    public function getLadra() {
        return $this->ladra;
    }

    public function getRaza() {
        return $this->raza;
    }

    public function setLadra($ladra): void {
        $this->ladra = $ladra;
    }

    public function setRaza($raza): void {
        $this->raza = $raza;
    }


    
}