<?php

class DadoPoker {
    const DADO = ["AS","K","Q","J","7","8"];
    private static $tiradasTotales = 0;
    private static $tirada;

        public static function tirar() {
        self::$tirada = self::DADO[rand(0,5)];
        //echo self::DADO[$tirada];
        self::$tiradasTotales++;
    }
    
    public static function nombreFigura() {
        echo "Ha salido: ". self::$tirada ."<br>";
    }
    
    /*
     * Getters & setters
     */
    public static function getTiradasTotales() {
        return self::$tiradasTotales;
    }

    public static function setTiradasTotales($tiradasTotales): void {
        self::$tiradasTotales = $tiradasTotales;
    }
}