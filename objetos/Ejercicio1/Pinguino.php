<?php

require_once 'Ave.php';

class Pinguino extends Ave {

    protected $aplaudo;
    protected $longitudPico;

    public function __construct($vivo, $alimentacion, $edad, $vuela, $embergadura, $aplaudo, $longitudPico) {
        parent::__construct($vivo, $alimentacion, $edad, $vuela, $embergadura);
        $this->aplaudo = $aplaudo;
        $this->longitudPico = $longitudPico;
    }

    public function __toString() {
        return parent::__toString(). "Soy un pinguino, me mide el pico ".$this->longitudPico. " cm y " .$this->aplaudo . " aplaudo.";
    }

    public function comePescado() {
        if ($this->aplaudo == "si") {
            echo '<br>Gluu gluuu que riiico';
        } else {
            echo "<br>Noooo puedoo";
        }
    }
    
    public function nadar() {
        echo "<br> soy rapidisimo";
    }
    
    public function pelea() {
        echo '<br> peleo';
    }
    
    /**
     * Getters & setters
     * @return type
     */
    public function getAplaudo() {
        return $this->aplaudo;
    }

    public function getLongitudPico() {
        return $this->longitudPico;
    }

    public function setAplaudo($aplaudo): void {
        $this->aplaudo = $aplaudo;
    }

    public function setLongitudPico($longitudPico): void {
        $this->longitudPico = $longitudPico;
    }
}