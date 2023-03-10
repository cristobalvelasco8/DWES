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
    $a = array (2, 4, 6, 8,10,12,14,16,18,20);
    $reversed = array_reverse($a);
    
              foreach ($reversed as $i => $value) {
    
                  echo $value. "<br>";
}
    
    
?>
    </body>
</html>
