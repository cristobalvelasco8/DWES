<?php
if (isset ($_POST ['enviar'])){
    echo "Nombre: ".$_POST['nombre']."<br>";
    echo "Apellidos: ".$_POST['apellidos']."<br>";
    echo "Curso: <br>";
    foreach($_POST ['curso'] as $c) {
        echo $c. "<br>";
    }  
}

