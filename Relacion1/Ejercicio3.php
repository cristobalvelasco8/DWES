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
        $a = 6;
        $b = 8;
        $c = 5;

        if ($a >= $b and $a >= $c) {
            echo "El número mayor es", $a;
        }
        if ($b >= $a and $b >= $c) {
            echo "El número mayor es ", $b;
        }
        if ($c >= $a and $c >= $b) {
            echo "El número mayor es ", $c;
        }
        ?>
    </body>
</html>