<?php
require_once './Modelo/conexion.php';
require_once './Modelo/Transferencia.php';

class controladorTransferencia{
    public static function historialCuenta($iban){
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM transferencias WHERE iban_origen='$iban'");
              
            return $result;
           
        } catch (PDOException $ex) {
            echo '<a href=inicio_cliente.php>---Ir a inicio---</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
     public static function insertar(Transferencia $t){
        try {
            $conex = new Conexion();
           
            $conex->exec("INSERT INTO transferencias (iban_origen, iban_destino, fecha, cantidad) VALUES ('$t->iban_origen','$t->iban_destino','$t->fecha','$t->cantidad')");
      
        } catch (PDOException $ex) {
            die('error con la base de datos');

        }
        unset($conex);
        
    }
}

