<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
    </head>
    <style>
        h1 {
            margin-bottom:0;
        }
        #encabezado {
            background-color:#ddf0a4;
        }
        #contenido {
            background-color:#EEEEEE;
            height:600px;
        }
        #pie {
            background-color:#ddf0a4;
            color:#ff0000;
            height:30px;
        }
    </style>

    <title></title>
</head>
<body>
    <?php
    $conexion = new mysqli("localhost", "dwes", "abc123.", "dwes");
    $error = false;
    if ($conexion->connect_errno) {
        $error = $conexion->connect_error;
    }
    ?>
    <!-- Encabezado -->
    <div id="encabezado">
        <h1>Ejercicio :Conjuntos de resultados de Mysqli</h1><!-- comment -->
        <?php
        if (!$error) {
            $result = $conexion->query("select * from producto");
            if ($conexion->errno) {
                $error = $conexion->errno;
            } else {
                ?>
                <form action="" method="POST">
                    Producto: 
                    <select name="producto" >
                        <?php
                        while ($fila = $result->fetch_object()) {
                            $selec = "";
                            if ($_POST['boton1'] && $_POST['producto'] == $fila->cod)
                                $selec = "selected";
                            echo "<option value='$fila->cod' $selec>$fila->nombre_corto</option>";
                        }
                        ?>
                    </select>
                    <input name="boton1" type="submit" value="Mostrar Stock"></input>
                </form>
                <?php
            }
        }
        ?>
    </div>
    <!-- 1 -->
    <div id="contenido">
           <form action = "" method = "post" >
                <?php
                if (isset($_POST["boton1"]) && !empty($_POST['producto'])) {

                    $result = $conexion->query('SELECT ti.nombre, ti.cod, sto.unidades from tienda as ti JOIN stock as sto where sto.tienda=ti.cod and sto.producto="' . $_POST['producto'] . '"');

                    $producto = $_POST['producto'];

                    if ($result) {
                       
                        while ($fila = $result->fetch_array()) {
                            echo "Tienda: " . $fila['nombre'] . " : <input type='text' name='uni[]' value='$fila[unidades]'><br>";

                            echo "<input type='hidden' name='producto' value='$_POST[producto]'/>";

                            echo "<input type ='hidden' name ='codigoTienda[]' value ='$fila[cod]'/>";
                        }
                        ?>

                        <input type="submit" name="actualizar" value="Actualizar">
                        <input type="hidden" name="actualizar" value='.$_post['producto'].'>
                    </form>
                    <?php
                }
            }
        
        
        
                    if (isset($_POST['actualizar'])) {
                
                $result2 = $conexion->stmt_init();
                $result2->prepare('UPDATE stock SET unidades=? WHERE tienda=? and producto=?');
                $result2->bind_param('iii', $unidades, $tienda, $_POST['producto']);
                for ($i = 0; $i < count($_POST['uni']); $i++) {
                    $unidades = $_POST["uni"][$i];
                    $tienda = $_POST["codigoTienda"][$i];
                    $result2->execute();
                   
                }
                $result2->close();
                $conexion->close();
            }
             ?>
    </div>
    <!-- 1 -->
    <div id="pie">
        <?php
        if ($error) {
            echo "Se ha producido un error " . $conexion->connect_error;
        }
        ?>
    </div>

</body>
</html>
