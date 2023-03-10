<html>
    <head>
        <title>listado</title>
    </head>
    <body>

  <link href="dwes.css" rel="stylesheet" type="text/css">
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
                    <select name="nombre">
                        <?php
                        try {
                            $productos = $conex->query('SELECT * from familia');
                            while ($nom = $productos->fetchObject()) {
                                echo '<option value="' . $nom->cod . '" ';
                                if (!empty($_POST["nombre"]) && $nom->cod == $_POST["nombre"]) {
                                    echo 'selected';
                                }
                                echo ">" . $nom->nombre . '</option>';
                            }
                        } catch (PDOException $exc) {
                            echo $exc->getTraceAsString(); // error de php
                            echo 'Error:' . $exc->getMessage(); // error del servidor de bd
                        }
                        ?>
                    </select>
                    <input type = "submit" name = "enviar" value = "enviar">
                </form>
            </div>

            <div id="contenido">


                <h2>Stock en las tiendas del producto:</h2>
                <?php
                if (!empty($_POST["nombre"])) {             
                    $stock = $conex->query("SELECT nombre_corto, cod, PVP FROM producto WHERE familia='$_POST[nombre]'");
                    echo '<form action = "editar.php" method = "post">';
                    while ($nombre = $stock->fetch(PDO::FETCH_ASSOC)) {
                        echo "Tienda: " . $nombre["nombre_corto"] . " // Precio: " . $nombre["PVP"];
                        echo "<button type='submit' name='editar' value=" . $nombre['cod'] . " >Editar</button> <br>";
                    }
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