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
        $n = rand(10, 50);
        if ($n % 2 == 0) {
            $n = $n + 1;
        }
        for ($n1 = 1; $n1 <= 10; $n1++) {
            echo "<tr>";
            for ($n2 = 1; $n2 <= 10; $n2++) {

                if ($n % 2 != 0) {
                    echo "<td>", $n, "</td>";
                    $n = $n + 2;
                }
            }

            echo "</tr>";
        }

        echo "</table>";
        ?>
    </body>
</html>
