<?php
    $dwes= new PDO("mysql:host=localhost; dbname=dwes; charset=UTF8mb4", "dwes", "abc123.");
    $result=$dwes->query("Select nombre_corto FROM producto");
        while($reg=$result->fetchObject()){
            $prod[]=$reg->nombre_corto;
            }            
       echo  json_encode($prod);

