<?php

abstract class Animal {
    protected $vivo;
    protected $alimentacion;
    protected $edad;
    
    public function __construct($vivo, $alimentacion, $edad) {
        $this->vivo = $vivo;
        $this->alimentacion = $alimentacion;
        $this->edad = $edad;
    }
    
    public function __toString() {
        return "Soy un animal, ". $this->vivo ." estoy vivo, soy ". $this->alimentacion ." y tengo ". $this->edad ." años.<br>";
    }

    /*
     * Getters & setters
     */
    public function getVivo() {
        return $this->vivo;
    }

    public function getAlimentacion() {
        return $this->alimentacion;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setVivo($vivo): void {
        $this->vivo = $vivo;
    }

    public function setAlimentacion($alimentacion): void {
        $this->alimentacion = $alimentacion;
    }

    public function setEdad($edad): void {
        $this->edad = $edad;
    }
}