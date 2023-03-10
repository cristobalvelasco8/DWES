
<html>
    <head>
        <title>El tiempo</title>
    </head>
    <body>
        <form action="" method="post">
            <label for="ciudades">Elige una ciudad:</label>
            <select id="ciudades" name="ciudades">
                <option value="Malaga">Málaga</option>
                <option value="Cordoba">Córdoba</option>
                <option value="Sevilla">Sevilla</option>
                <option value="Madrid">Madrid</option>
            </select>
            <input type="submit" name="enviar" value="Consultar">
        </form>
        <br>
    </body>
</html>
<?php
if(isset($_POST['enviar'])){
    
$server=file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_POST['ciudades'].",es&APPID=aa95d8453fd1fd762f763782eb661afa&lang=es&units=metric");
$tiempo= json_decode($server);
var_dump($tiempo);
echo "<hr>";
echo "<h3>Datos sueltos: </h3>";
echo "Nombre: ".$tiempo->name."<br>";
echo "Temperatura: ".$tiempo->main->temp."ºC<br>"; 
echo "Humedad: ".$tiempo->main->humidity."%<br>";
echo "Icono: ".$tiempo->weather[0]->icon."<br>";
echo "Presión: ".$tiempo->main->pressure."mb<br>";

?>
<?php
}
?>