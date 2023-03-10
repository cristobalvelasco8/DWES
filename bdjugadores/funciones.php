<?php

function establecerConexion() {
    $jugadores = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');

    if ($jugadores->connect_error) {
        die("ERROR AL CONECTAR");
    }
}

function mostrarResultados($resultado) {
    while ($fila = $resultado->fetch_object()) {
        echo "==================================<br>";
        echo "Dni: " . $fila->Dni . "<br>";
        echo "Nombre: " . $fila->Nombre . "<br>";
        echo "Dorsal: " . $fila->Dorsal . "<br>";
        echo "Posición: " . $fila->Posicion . "<br>";
        echo "Equipo: " . $fila->Equipo . "<br>";
        echo "Goles: " . $fila->Goles . "<br>";
    }
}

function validarDni($dni) {
    if (preg_match("/^\d{8}[A-Z]{1}$/", $dni)) { //8 digitos y 1 letra mayúscula
        return true;
    }
}

function validarNombre($nombre) {
    if (preg_match("/^[a-zA-Z\s]{1,30}$/", $nombre)) { //Solo texto de menos de 30 caracteres
        return true;
    }
}

function validarPosicion($posicion) {
    if ($posicion != 0) {
        return true;
    }
}

function validarEquipo($equipo) {
    if (preg_match("/^[a-zA-Z]{1,}/", $equipo)) {
        return true;
    }
}

function validarGoles($goles) {
    if (preg_match("/^\d*$/", $goles)) {
        return true;
    }
}