<?php
require_once __DIR__ . '/vendor/autoload.php';
$server=new nusoap_server();
$namespace="http://localhost/tema6/Server.php";
//Se especifica cual será el nombre del servicio web
$server->configureWSDL("Ejemplo 1 Servicios Web",$namespace);
$server->wsdl->schemaTargenNamespace=$namespace;
/*Registraremos cuales serán las funcionalidades de nuestro servicio web
*register contiene muchos parámetros mas pero solo nos enfocaremos en los principales:
*register(accion, parametros_entrada, parametros_salida)*/
$server->register('Suma',
array('a'=>"xsd:int",'b'=>"xsd:int"),array("return"=>"xsd:int"),FALSE,FALSE,FALSE,FALSE,"Suma");
$server->register('Saludar', array('nombre'=>"xsd:string"),
array("return"=>"xsd:string"),FALSE,FALSE,FALSE,FALSE,"Saludar");
$server->register('ObtenerDatos',array('dni'=>"xsd:string"),array("return"=>"xsd:Array"),FALSE,FALSE,
FALSE,"Devuelve array");
//Declararemos las funciones (acciones soap) que utilizara nuestro servicio web
function Saludar($nombre){
 return "Hola ".$nombre;
}
function Suma($a,$b){
 $suma=$a+$b;
 return $suma;
}
function ObtenerDatos($dni){
 $arr= array('Antonio',"de la Rosa","41");
 return ($arr);
}
//Desplegaremos con $server->service nuestro servicio web
$server->service(file_get_contents("php://input"));
?>
El cliente que va a usar este servicio web se va a llamar Client.php y va a tener el siguiente código:
<?php
require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro servicio web.
$wsdl="http://localhost/WebService/Ejemplo1/Server.php?wsdl";
//Instanciamos un cliente nativo de la clase de PHP con el $wsdl especificado anteriormente.
$client=new nusoap_client($wsdl);
//Realizamos la llamada al servicio web con Call
//Donde el primer parametro es la accion que llamara, y el segundo los parametros esperados por el web service
$respuestaSaludar=$client->call('Saludar',array('nombre'=>"Antonio"));
echo $respuestaSaludar;
$respuestaSuma = $client->call('Suma', array('a' => '8','b' => '8'));
echo $respuestaSuma;
$respuestaObtenerDatos=$client->call('ObtenerDatos',array('dni'=>"12345678L"));
print_r($respuestaObtenerDatos);
?>