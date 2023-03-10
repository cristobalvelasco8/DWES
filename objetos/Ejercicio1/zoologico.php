<?php
require_once 'Animal.php';
require_once 'Ave.php';
require_once 'Mamifero.php';
require_once 'Perro.php';
require_once 'Gato.php';
require_once 'Canario.php';
require_once 'Pinguino.php';
?>
<html>
    <head>
        <title>ZOOLÓGICO</title>
    </head>
    <body>
        <?php
        $perro = new Perro("si", "omnivoro", 4, "cuadrupedo", "su caseta", "si", "Pastor Aleman");
        echo $perro;
        $perro->correrTrasLaLiebre();
        $perro->ladra();
        $perro->daLaPata();
        echo "<hr>";
        $gato = new Gato("si", "hervívoro", 13, "tengo pelo", "su casita", "marron", "si");
        echo $gato;
        $gato->duerme();
        $gato->juega();
        $gato->arania();
        echo "<hr>";
        $canario = new Canario("si", "granívoro", 4, "no", 20, "si", "amarillo");
        echo $canario;
        $canario->bebe();
        $canario->estaVivo();
        $canario->seBalanceaEnElColumpio();
        echo "<hr>";
        $pinguino = new Pinguino("si", "carnívoro", 56, "no", 30, "si", 42);
        echo $pinguino;
        $pinguino->comePescado();
        $pinguino->nadar();
        $pinguino->pelea();
        ?>
    </body>
</html>