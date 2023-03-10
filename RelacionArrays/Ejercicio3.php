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
  $array = array("Enero " => 9, "Febero" => 12, "Marzo" => 0, "Abril" => 17);

foreach ($array as $mes => $valor) {
     if($valor == 0){
         "<br>";
     }else{
      echo "$mes \n" ;
      echo "$valor<br>";   
     }
}
?>
    </body>
</html>
