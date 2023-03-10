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
$numeros=array(3,2,8,123,5,1); 

for($i=1;$i<count($numeros);$i++)
    {
        for($j=0;$j<count($numeros)-$i;$j++)
        {
            if($numeros[$j]>$numeros[$j+1])
            {
                $k=$numeros[$j+1];
                $numeros[$j+1]=$numeros[$j];
                $numeros[$j]=$k;
            }
        }
    }


foreach ($numeros as $indice => $valorFinal){
    echo "Indice", "\n", $indice, "\n","valor: ", $valorFinal ,"<br>";
    
}
?>
    </body>
</html>