<?php
/*
* simplemente contiene los métodos que hemos registrado en nuestro webservice.
*/
class Service
{
public function getUsers()
{
//echo "Hola";
return [
["id" => 1, "name" => "Iparra"],
["id" => 2, "name" => "Juan"]
];
}
public function sum($a, $b)
{
return ($a+$b);
}
public function getName($name)
{
return "Hello " . $name;
}
}
?>