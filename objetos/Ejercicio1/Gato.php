<?php

require_once 'Mamifero.php';

class Gato extends Mamifero {

    protected $pelo;
    protected $arania;

    public function __construct($vivo, $alimentacion, $edad, $tipo, $habitat, $pelo, $arania) {
        parent::__construct($vivo, $alimentacion, $edad, $tipo, $habitat);
        $this->pelo = $pelo;
        $this->arania = $arania;
    }

    public function __toString() {
        return parent::__toString() . "Soy un gato, mi pelo es " . $this->pelo . " y " . $this->arania . " araño.";
    }

    public function arania() {
        if ($this->arania == "si") {
            echo '<br>ZASSSSS MIAUUU';
        } else {
            echo "<br> no araño";
        }
    }

    public function duerme() {
        echo "<br> ZZZZZZ";
    }

    public function juega() {
        echo '<br> juego!';
    }

    /**
     * Getters & setters
     * @return type
     */
    public function getPelo() {
        return $this->pelo;
    }

    public function getArania() {
        return $this->arania;
    }

    public function setPelo($pelo): void {
        $this->pelo = $pelo;
    }

    public function setArania($arania): void {
        $this->arania = $arania;
    }

}