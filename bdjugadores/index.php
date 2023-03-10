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
    if (isset($_POST['insertar']))
        echo "se ha insertado los datos correctamente";
    ?>
      <h2>Menú</h2>
<ul> 
    <li><a href="introducir.php">Introducir</a></li>
    <li><a href="mostrar.php">Mostrar</a></li>
    <li><a href="buscar.php">Buscar</a></li>
    <li><a href="modificar.php">Modificar</a></li>
    <li><a href="borrar.php">Borrar</a></li>
</ul>
    </body>
</html>
