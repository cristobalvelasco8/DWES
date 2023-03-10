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
        $ano = 2024;

        if ($ano % 4 == 0) {
            echo "El año " . $ano . " es bisiesto";
            if ($ano % 100 == 0) {
                echo "El año " . $ano . " es bisiesto";
                if ($ano % 400 == 0) {
                    echo "El año " . $ano . " es bisiesto";
                }
            }
        } else {
            echo "El año " . $ano . " no es bisiesto";
        }
        ?>
    </body>
</html>
