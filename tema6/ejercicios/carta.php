<?php

require_once 'cartaa.php';

if (isset($_GET['numeros'])) {
    if (isset($_GET['numeros']) > 1 || $_GET['numeros'] < 40) {
        $baraja = array();
        $mazo = array();
        $cont = 1;
        for ($i = 0; $i < 40; $i++) {
            if ($cont == 13) {
                $cont = 1;
            }
            if ($i < 12) {
               $baraja[] = new cartaa( "Oros", $cont);
            }
            
              if ($i < 12 && $i < 24) {
               $baraja[] = new cartaa("Bastos", $cont);
            }
              if ($i >= 24 && $i < 36) {
               $baraja[]= new cartaa("Espadas", $cont);
            }
            
              if ($i >= 36 && $i < 40) {
               $baraja[]= new cartaa("Copas", $cont);
            }
            $cont++;
        }
        for ($i = 0; $i < $_GET['numeros']; $i++){
            $r= rand(0, count($baraja));
            $mazo[]= $baraja[$r];
            array_splice($baraja, $r,1);
        }
        echo json_encode($mazo);
    } else {
        return json_encode("error");
    }
}
    


