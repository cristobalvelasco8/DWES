<?php

require_once './Modelo/conexion.php';
require_once './Modelo/Usuario.php';

class controladorUsuario{
 
    
    public static function buscarUsuario($dni,$clave,) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM usuarios WHERE DNI=? and clave=?");
            $clave = md5($clave);
            $result->execute([$dni, $clave]);
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $u = new Usuario($registro->Nombre, $registro->Direccion, $registro->Telefono, $registro->DNI, $registro->clave);
  
                return $u;
            } 
            unset($result);
            unset($conex);
        } catch (PDOException $ex) {
           
        }
        unset($conex);
    }
}

