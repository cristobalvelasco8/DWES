<?php
//$options=array(PDO::ATTR_ERRMODE=>PDO::ATTR_ERRMODE_SILENT);
$options=array(PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ);
try {
    $conex = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4','dwes','abc123.');
    //$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $reg=$conex >exec("UPDATE stock SET unidades=100 WHERE producto='ACERAX3950'");
    echo "Filas actualizadas: ".$reg;
    $result=$conex->query("SELECT * FROM producto");
    if ($result->rowCount()>0) {
        while ($fila=$result->fetch()) {
            echo "Nombre: ".$fila->nombre_corto."<br>";
            echo "PVP: ".$fila->pvp."<br>";
            echo "=============<br>";
        }
    } else {
        echo "No hay registros";
    }
} catch (PDOException $ex) {

    echo $ex->getMessage();
}
