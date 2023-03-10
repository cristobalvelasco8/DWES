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
        $a = 8;
        $b = 9;
        $c = 7;

        if ($a > $b && $a > $c) {
            echo "El número más grande es $a <br>";
            if ($b > $c) {
                echo "El segundo número más grande es $b <br>";
                echo "El tercer número más grande es $c <br>";
            }
            if ($c > $b) {
                echo "El segundo número más grande es $c <br>";
                echo "El tercer número más grande es $b <br>";
            }
        }

        if ($b > $a && $b > $c) {
            echo "El número más grande es $b <br>";
            if ($a > $c) {
                echo "El segundo número más grande es $a <br>";
                echo "El tercer número más grande es $c";
            }
            if ($c > $a) {
                echo "El segundo número más grande es $c <br>";
                echo "El tercer número más grande es $a <br>";
            }
        }

        if ($c > $b && $c > $a) {
            echo "El número más grande es $c <br>";
            if ($b > $a) {
                echo "El segundo número más grande es $b <br>";
                echo "El tercer número más grande es $a <br>";
            }
            if ($a > $b) {
                echo "El segundo número más grande es $a <br>";
                echo "El tercer número más grande es $b <br>";
            }
        }
        ?>
    </body>
</html>