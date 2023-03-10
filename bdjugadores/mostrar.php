<?php
require_once 'funciones.php'; //Importar el fichero de funciones
    
$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
$suma = 0;
if ($dwes->connect_error) {
    die("ERROR AL CONECTAR");
}

$result = $dwes->query("select * from jugador");

if ($result->num_rows) {

    echo "MOSTRANDO LA LISTA DE JUGADORES:<br>";
    mostrarResultados($result);
}
$dwes->close();

echo '<br><button value="Volver"><a href="index.php">Volver</a></button>';

