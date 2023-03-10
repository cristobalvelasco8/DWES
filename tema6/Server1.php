<?php
require_once __DIR__ . '/vendor/autoload.php'; class
Server
{
private $_soapServer = null;
public function __construct()
{
require_once('Service.php');
$this->_soapServer = new nusoap_server();
$miURL='http://localhost/WebService2/Ejemplo2/Server.php';
$this->_soapServer->configureWSDL("Example WSDL",$miURL);
$this->_soapServer->wsdl->schemaTargetNamespace=$miURL;
/* Registrar puntos de entrada a nuestro Webservice: Para dar acceso al cliente, debemos utilizar el método
register dentro del constructor que hemos creado anteriormente. */
$this->_soapServer->register(
'Service.getUsers', // method name
array(), // input parameters
array('return' => 'xsd:Array'), // output parameters
false, // namespace
false, // soapaction
'rpc', // style
'encoded', // use
'Servicio que retorna un array de usuarios' // documentation
);
$this->_soapServer->register(
'Service.sum',
array('a' => 'xsd:string', 'b' => 'xsd:string'),
array('return' => 'xsd:int'),
false,
false,
"rpc",
"encoded",
"Servicio que suma dos números"
);
$this->_soapServer->register(
"Service.getName",
array('name' => "xsd:string"),
array("return" => "xsd:string"),
false,
false,
"rpc",
"encoded",
"Servicio que retorna un string"
);
//procesamos el webservice
$this->_soapServer->service(file_get_contents("php://input"));
}
}
$server = new Server();
?>
