<?php
require_once './Modelo/conexion.php';
require_once './Modelo/Juegos.php';
require_once './Modelo/Cliente.php';

class controladorAlquiler{
    
    /*
     * MÃ©todo para insertar un nuevo alquiler, lo llamaremos cuando el usuario alquile un juego
     */
    public static function insertar($id, $codigo, $dni, $fechaA, $fechaD){
         try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO alquiler VALUES ('$id','$codigo','$dni','$fechaA','$fechaD')");
           
        } catch (PDOException $ex) {
            //echo '<a href=index.php>Ir a inicio</a>';
            echo 'no inserto';
            header('Location:vistaCliente.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    /*
     * MÃ©todos para recuperar la lista de todos los juegos alquilados con el nombre de la persona
     * que lo tiene alquilado
     */
    public static function recuperarTodosConCliente(){
        try{
           $conex = new Conexion();
          $result = $conex->query("SELECT Imagen, Nombre_juego, Nombre_consola,Anno, Precio, Nombre FROM alquiler, cliente, juegos WHERE Cod_juego=Codigo AND DNI_cliente=DNI AND Fecha_devol='null'");
           return $result;
        } catch (PDOException $ex){
            die('error con la base de datos');
        }
        unset($result);
        unset($conex);
    }
    
    /*
     * MÃ©todo que recibe el $cod y le cambia la propiedad ALQUILADO a SI cuando un juego es alquilado
     */
     public static function cambiarAlquilerSI($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("UPDATE juegos SET Alguilado=? WHERE Codigo ='$cod'");
           
            $alquiler = "SI";
            $result->bindParam(1, $alquiler);
            
            $result->execute();
            $result = null;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }

      /*
       * MÃ©todo que recibe el $codigo de un juego y cuando el usuario lo devuelve,
       * le cambia la propiedad ALQUILADO a NO
       */
      public static function cambiarAlquilerNO($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("UPDATE juegos SET Alguilado=? WHERE Codigo ='$cod'");
           
            $alquiler = "NO";
            $result->bindParam(1, $alquiler);
            
            $result->execute();
            $result = null;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }

      /*
       * MÃ©todo que elimina el alquiler de la tabla alquiler
       */
      public function eliminarAlquiler($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->exec("DELETE from alquiler WHERE Cod_juego ='$cod'");
           
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      
      /*
       * MÃ©todo que recibe el $codigo y la $fecha (fecha de devoluciÃ³n), para modificar esa fecha
       * que a priori la metemos como null
       */
      public static function modificarAlquiler($cod, $fechaD){
           try {
            $conex = new Conexion();
            $conex->exec("UPDATE alquiler SET Fecha_devol='$fechaD' WHERE Cod_juego='$cod'");
           
        } catch (PDOException $ex) {

            //echo 'no inserto';
           // header('Location:vistaCliente.php');
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
      }
      
      /*
       * MÃ©todo que recibe el CÃ³digo del juego y el ID que tiene en la bbdd para sacar las fechas
       * que tiene para calcular
       */
      public static function calculoFechas($cod, $id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from alquiler WHERE Cod_juego ='$cod' AND id='$id'");
                   
            return $result;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      
      /*
       * MÃ©todo que recibe el CÃ³digo y el ID del juego para 
       * buscar el precio despuÃ©s
       */
       public static function pagoCliente($cod, $id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT Precio from alquiler, juegos WHERE Cod_juego ='$cod' AND Codigo=Cod_juego AND id='$id'");
                   
            return $result;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      

}


