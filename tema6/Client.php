<?php
/* En este archivo estableceremos la comunicación con nuestro servidor SOAP */
require_once __DIR__ . '/vendor/autoload.php';
class Client {
private $_soapClient=null;
public function __construct() {
$this->_soapClient=new nusoap_client("http://localhost/WebService2/Ejemplo2/Server.php?wsdl");
}
/*El código anterior sólo crea la instancia de nusoap_client y le pasamos el
* endpoit, que es la url del servidor, de esta forma el cliente sabrá a qué
* servidor debe enviar las peticiones.*/
/*A continuación vamos a definir tres métodos dentro de la clase Client, que
* será peticiones a nuestro servidor*/
public function users(){
$result= $this->_soapClient->call('Service.getUsers',array());
print_r($result);
}
public function sum(){
$result= $this->_soapClient->call('Service.sum', array('a' => 2, 'b' => 2));
echo "SUMA=".$result;
}
public function getName(){
$result = $this->_soapClient->call('Service.getName', array('name' => 'Iparra'));
echo $result;
}
}
/*Puedes observar que todos los métodos son prácticamente iguales, además de
* simples, utilizando el método call podemos realizar peticiones al servidor,
* el primer parámetro es Clase.metodo que llamamos, y el segundo los datos
* de entrada para ese método.
*/
?>