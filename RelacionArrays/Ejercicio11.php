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

$array1 = array();
$array2 = array();
$array3 = array();

for ($x=0;$x< 4;$x++) {
  $num_aleatorio = rand(1,100);
  array_push($array1,$num_aleatorio);
}
for ($x=0;$x< 4;$x++) {
  $num_aleatorio = rand(1,100);
  array_push($array2,$num_aleatorio);
}

echo "Primer array:";
print_r($array1);
echo "<br>";
echo "Segundo array:";
print_r($array2);
echo "<br>";
echo "Array combinado con merge:";
$resultado = array_merge($array1, $array2);
print_r($resultado);

    for ($i = 0; $i < 4; $i++ ){
        $array3[$i] = $array1[$i];

    }

    for ($a = 0; $a < 4; $a++ ){
        $array3[$i] = $array2[$a];
        $i++;
    }
echo "<br>";
echo "Array combinado manual:";
print_r($array3);
echo "<br>";
/*echo "Array con sort:";
 * asort($array3);
print_r($array3); */

echo "<br>";
echo "Array con burbuja:";
for($i=1;$i<count($array3);$i++)
    {
        for($j=0;$j<count($array3)-$i;$j++)
        {
            if($array3[$j]>$array3[$j+1])
            {
                $k=$array3[$j+1];
                $array3[$j+1]=$array3[$j];
                $array3[$j]=$k;
                echo "<br>";
                print_r($array3);
            }
        }
    }



?>
    </body>
</html>