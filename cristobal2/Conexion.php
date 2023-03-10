<?php
// Clase gestora de la conexion a la bd
/**
 * Description of Conexion
 *
 * @author DWES
 */
class Conexion extends PDO {

    protected $dsn = "mysql:host=localhost;dbname=hospitales_comares;charset=utf8mb4";
    protected $username = "dwes";
    protected $password = "abc123.";

    public function __construct() {
        parent::__construct($this->dsn, $this->username, $this->password);
    }

}
