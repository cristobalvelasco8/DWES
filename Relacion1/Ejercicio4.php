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
        $n = 0;
        for ($n1 = 1; $n1 <= 7; $n1++) {
            echo "<tr>";
            for ($n2 = 1; $n2 <= 5; $n2++) {
                $n++;
                echo "<td>", $n, "</td>";
            }

            echo "</tr>";
        }

        echo "</table>";
        ?>
    </body>
</html>
