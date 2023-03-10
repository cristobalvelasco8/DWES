<html>
    <head>
        <title>actualizar</title>
    </head>
    <body>


        <?php
        try{
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
        $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);

        $error = $conex->errorInfo();
        echo $error[2];
        
        
        try{
        $productos = $conex->query("UPDATE producto SET nombre = '$_POST[nombre]', nombre_corto = '$_POST[nombre_corto]', descripcion = '$_POST[descripcion]', PVP = '$_POST[PVP]'  where cod='$_POST[editar]'");
        echo "Consulta realizada con éxito";
        
        echo '<form method="POST" action="plantilla.php">'; 
        echo "<button type='submit' name='listado'>Volver</button>";
                        
        echo '</form>';
        
        }catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
        }
        
        
        }catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
        }
        ?>





    </body>
</html>