<html>
    <head>
        <title>ejr</title>
        <style>
            h1 {margin-bottom:0;}
            #encabezado {background-color:#ddf0a4;}
            #contenido {background-color:#EEEEEE;height:300px;}
            #pie {background-color:#ddf0a4;color:#ff0000;height:30px;}
        </style>
    </head>
    <body>

        <?php
        try {
            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);

            $error = $conex->errorInfo();
            echo $error[2];
            ?>

            <div id="encabezado">
                <h1>Productos</h1>
                <form action = "" method = "post">
                    <select name="productos">
                        <?php
                        $productos = $conex->query('SELECT * from producto');
                        while ($nom = $productos->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $nom["cod"] . '" ';
                            if (!empty($_POST["productos"]) && $nom["cod"] == $_POST["productos"]) {
                                echo 'selected';
                            }
                            echo ">" . $nom["nombre_corto"] . '</option>';
                        }
                        ?>
                    </select>
                    <input type = "submit" name = "enviar" value = "Enviar">
                </form>
            </div>
            <div id="contenido">


                <h2>Stock en las tiendas del producto:</h2>
                <?php
                if (!empty($_POST["actualizar"])) {
                    $stock = $conex->query('SELECT s.unidades, t.cod FROM stock s, tienda t WHERE s.producto = "' . $_POST["productos"] . '" and s.tienda = t.cod;');
                    $i = 0;
                    while ($a = $stock->fetch(PDO::FETCH_ASSOC)) {
                        $consulta = $conex->prepare('UPDATE stock SET unidades = ? WHERE producto = ? AND tienda ="' . $a["cod"] . '";');
                        $unidad = $_POST["unidades"][$i];
                        $producto = $_POST["productos"];
                        $consulta->bindParam(1, $unidad);
                        $consulta->bindParam(2, $producto);
                        $consulta->execute();
                        $i++;
                    }
                    $consulta = null;
                }

                if (!empty($_POST["productos"])) {
                    $stock = $conex->query("SELECT tienda.nombre, stock.unidades FROM stock JOIN tienda WHERE stock.tienda=tienda.cod AND producto='" . $_POST["productos"] . "'");
                    echo '<form action = "" method = "post">';
                    while ($nombre = $stock->fetch(PDO::FETCH_ASSOC)) {
                        echo "Tienda: " . $nombre["nombre"] . " // Unidades: " . '<input type="text" name="unidades[]" value="' . $nombre["unidades"] . '">' . "<br>";
                    }
                    echo '<input type = "hidden" name = "productos" value = "' . $_POST["productos"] . '">';
                    echo '<input type = "submit" name = "actualizar" value = "Actualizar">';
                    echo ' </form>';
                }
            } catch (PDOException $exc) {
                echo $exc->getTraceAsString(); // error de php
                echo 'Error:' . $exc->getMessage(); // error del servidor de bd
            }
            ?>

        </div>

    </body>
</html>