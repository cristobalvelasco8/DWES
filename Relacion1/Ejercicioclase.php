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

$departamentos= array("Marketing" => array ("Nombre" => "Juan", "Apellidos" => "Pérez", "Salario" => 1600, "Edad" => 43),
 "Contabilidad" => array ("Nombre" => "Rosa", "Apellidos" => "López", "Salario" => 1550, "Edad" => 36),
 "Ventas" => array ("Nombre" => "Mario", "Apellidos" => "Cabezas", "Salario" => 1725, "Edad" => 54),
  "Informatica" => array ("Nombre" => "Carlos", "Apellidos" => "Conde", "Salario" => 1990, "Edad" => 28),
   "Direccion" => array ("Nombre" => "Alberto", "Apellidos" => "Sanchez", "Salario" => 2500, "Edad" => 55));
  ?>
<table border= "solid 1 px">
    <tr>
        <th></th>

<?php

          foreach ($departamentos["Marketing"] as $key => $value) {
    echo "<th>" .$key."</th>";
}
 
     
   echo "</tr>";
        foreach ($departamentos as $ind1 =>$nomDep) {
       echo "<tr><th>" .$ind1. "</th>";
foreach ($nomDep as $ind2 => $propiedad) {
         echo "<td>" .$propiedad. "</td>";
    
}
}
?>

        
      
    </tr>
    </table>
    </body>
</html>
