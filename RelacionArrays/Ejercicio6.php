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
    $array = array ("Madrid", "Barcelona", "Londres", "New York",
"Los Ángeles", "Chicago");
    
    foreach($array as $valor => $nombre){
    echo "La ciudad con el indice $valor tiene el nombre de $nombre <br>";
}
    
    
  

    
    
?>
    </body>
</html>
