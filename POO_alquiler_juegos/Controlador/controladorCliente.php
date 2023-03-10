<?php

require_once './Modelo/conexion.php';
require_once './Modelo/Cliente.php';

class controladorCliente{
    /*
     * MÃ©todo para insertar un Cliente nuevo en la bbdd
     * 
     *
     */
    public static function insertar(Cliente $c){
         try {
            $conex = new Conexion();
            $pass= md5($c->clave);
            $conex->exec("INSERT INTO cliente (DNI,Nombre,Apellidos,Direccion,Localidad,Clave,Tipo,imagen) VALUES ('$c->dni','$c->nombre','$c->apellidos','$c->direccion','$c->localidad', '$pass', '$c->tipo', '$c->imagen')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            header('Location:index.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    /*
     * MÃ©todo para buscar al Cliente, dÃ³nde reciebe el DNI y la contraseÃ±a, 
     * y le pasamos el array de errores
     */
    public static function buscarCliente($dni,$clave,&$errores) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM cliente WHERE DNI=? and Clave=?");
            $clave = md5($clave);
            $result->execute([$dni, $clave]);
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $c = new Cliente($registro->DNI, $registro->Nombre, $registro->Apellidos, $registro->Direccion, $registro->Localidad,$registro->Clave,$registro->Tipo,$registro->imagen);
  
                return $c;
            } 
            unset($result);
            unset($conex);
        } catch (PDOException $ex) {
             $errores[]=$exc->getMessage();
        }
        unset($conex);
    }
    
    public static function buscarClienteSoloDni($dni,&$errores) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM cliente WHERE DNI=?");
            
            $result->execute([$dni]);
            if ($result->rowCount()) {
                $registro = $result->fetchObject();
                $c = new Cliente($registro->DNI, $registro->Nombre, $registro->Apellidos, $registro->Direccion, $registro->Localidad,$registro->Clave,$registro->Tipo);
  
                return $c;
            } 
            unset($result);
            unset($conex);
        } catch (PDOException $ex) {
             $errores[]=$exc->getMessage();
        }
        unset($conex);
    }
    
    /*
     * MÃ©todo para recuperar el listado de Clientes de la bbdd
     */
    public static function recuperarTodos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM cliente");
            if ($result->rowCount()) {
                //creo un producto
                //$p = new Producto();
                while ($row = $result->fetchObject()) {
                    $c = new Cliente($row->DNI, $row->Nombre, $row->Apellidos, $row->Direccion, $row->Localidad,$row->Clave,$row->Tipo);
                    $clientes[] = clone($c);                   
                }

                return $clientes;
            } else
                return false;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            header('Location:index.php');
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
    
    public static function eliminarCliente($dni) {
        try {
            $conex = new Conexion();
            $conex->exec("DELETE from cliente where DNI='$dni'");
        } catch (PDOException $ex) {
            header('Location:vistaCliente.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($result);
        unset($conex);
    }
    
    public static function modificarCliente(Cliente $c) {
        try {
            $conex = new Conexion();
            $conex->exec("UPDATE cliente SET Nombre='$c->nombre', Apellidos='$c->apellidos', Direccion='$c->direccion', Localidad='$c->localidad', Clave='$c->clave' WHERE DNI='$c->dni'");
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            echo 'no inserto';
            eader('Location:vistaCliente.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($result);
        unset($conex);
    }
}

