<?php

$dwes= new mysqli('localhost', 'dwes', 'abc123.' , 'dwes');
$stmt=$dwes->stmt_init();
//$stmt->prepare("INSERT INTO tienda (cod,nombre,tlf) values (?,?,?)");
/*if (!$stmt->errno){
    $cod=4;
    $nombre="SUCURSAL3";
    $telf=123456789;
    $stmt->bind_param('isi',$cod,$nombre,$telf);
    $stmt->execute();
    if($stmt->errno){
        die('ERROR'.$stmt->error);
    }
        $cod=5;
    $nombre="SUCURSAL4";
    $telf=987654321;
    $stmt->execute();
        if($stmt->errno){
        die('ERROR'.$stmt->error);
    }
    echo "REGISTROS INSERTADOS CORRECTAMENTE";
    $stmt->close();
    
}*/

$stmt->prepare("SELECT * FROM tienda WHERE cod>?");
if(!$stmt->errno){
    $cod=1;
    $stmt->bind_param('i',$cod);
    $stmt->execute();
    $stmt->bind_result($codigo,$nombre,$telf);
    while($stmt->fetch()){
        echo "Codigo:".$codigo. "<br>";
        echo "Nombre:".$nombre. "<br>";
        echo "Teléfono:".$telf. "<br>";
        
    }
    echo "<br>===============================<br>";
$cod=2;
        $stmt->execute();
$result=$stmt->get_result();
    while($fila=$result->fetch_object()){
        echo "Codigo:".$fila->cod. "<br>";
        echo "Nombre:".$fila->nombre. "<br>";
        echo "Teléfono:".$fila->tlf. "<br>";
        
    }
}
