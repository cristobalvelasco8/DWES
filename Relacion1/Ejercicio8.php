<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
echo "<table border=1>"; 
$num = 0;
$suma = 0;
     for($i = 0; $i<=200; $i++){
         $num = $num + 1;
         if($num % 2 == 0){
            $suma = $suma + $num;
         }
 }
    echo "La sumatoria es: $suma <br>";


?> 
    </body>
</html>
