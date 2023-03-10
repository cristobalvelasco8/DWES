<?php

$datos=file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=37.4112388280941&lon=-4.477851220904833&appid=aa95d8453fd1fd762f763782eb661afa&units=metric");
echo "Datos en json: <br>" .$datos;
$tiempo=json_decode($datos);
echo "<br>==============<br>";
var_dump($tiempo);
echo "<br>" .$tiempo->main->temp;

