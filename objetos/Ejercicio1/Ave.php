<?php

require_once 'Animal.php';
abstract class Ave extends Animal{
    protected $vuela;
    protected $embergadura;
    
    public function __construct($vivo, $alimentacion, $edad, $vuela, $embergadura) {
        parent::__construct($vivo, $alimentacion, $edad);
        $this->vuela = $vuela;
        $this->embergadura = $embergadura;
    }

    public function __toString() {
        return parent::__toString(). "Como soy Ave, ". $this->vuela ." vuelo, mi embergadura es de ". $this->embergadura ." cm.<br> ";
    }
    
    /**
     * Getters & setters
     * @return type
     */
    public function getVuela() {
        return $this->vuela;
    }

    public function getEmbergadura() {
        return $this->embergadura;
    }

    public function setVuela($vuela): void {
        $this->vuela = $vuela;
    }

    public function setEmbergadura($embergadura): void {
        $this->embergadura = $embergadura;
    }


}