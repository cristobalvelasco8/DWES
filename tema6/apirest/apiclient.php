<?php

$datos=file_get_contents("http://localhost/tema6/apirest/apiserver.php");
        
   $productos= json_decode($datos); 

   var_dump($productos);
   
   echo "<br>" .$productos[6];

