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
        $conex=new mysqli("localhost","dwes","abc123.","dwes"); 
        if(!$conex->connect_errno){
            $conex->set_charset("utf8mb4");
            $error= $conex->query("insert into tienda (cod,nombre,tlf) values (4,'SUCURSAL3',123456789)");
            if($error) echo "Registro insertado correctamente";
            else echo $conex->error;
        }
        else  echo $conex->connect_error."-".$conex->connect_errno;
        ?>
    </body>
</html>
