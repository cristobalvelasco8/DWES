<?php
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$usuario = false;
$pass = false;

if (isset($_POST['acceder'])) {
    try {
        $dwes = new PDO('mysql:host=localhost;dbname=usuarios;charset=utf8mb4', 'dwes', 'abc123.', $options);
        $result = $dwes->query("select * from usuarios where usuario = '$_POST[usuario]'");
        $fila = $result->fetch();

        if ($fila) {
            if ($_POST['usuario'] === $fila->usuario) {
                $usuario = true;
            }

            if (md5($_POST['pass']) === $fila->pass) {
                $pass = true;
            }

            if ($usuario && $pass) {
                setcookie("tiempo", time(), time() + 3600);
                //setcookie("nombre", $_POST['usuario'], time() + 3600);
                //setcookie("pass", $_POST['pass'], time() + 3600);

                if (isset($_POST['recordarme'])) {
                    setcookie("recordar", "recuerdame", time() + 3600);
                } else if (isset($_COOKIE['recordar'])) {
                    setcookie("recordar", "recuerdame", time() - 3600);
                }

                if (isset($_COOKIE['tiempo'])) {
                    echo "Hola " . $_POST['usuario'] . ", su último inicio de acceso fue el día " . date("d/m/y", $_COOKIE['tiempo']) . " a las " . date("H:i:s", $_COOKIE['tiempo']);
                } 
                ?>
                <form action="" method="POST">
                    <input type="hidden" name="usuario" value="<?php echo $_POST['usuario'] ?>">
                    <input type="hidden" name="pass" value="<?php echo $_POST['pass'] ?>">
                    <br><input type='submit' name='volver' value='Volver'>
                </form>
                <?php
            }
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}

if (!$usuario || !$pass) {
    ?>
        <form action="" method="POST">
            Usuario: <input type="text" name="usuario" <?php if (isset($_COOKIE['recordar']) && isset($_POST['volver'])) echo "value='" . $_POST['usuario'] . "' " ?>><br>
            Contraseña: <input type="password" name="pass" <?php if (isset($_COOKIE['recordar']) && isset($_POST['volver'])) echo "value='" . $_POST['pass'] . "' " ?>"><br>
            Recordarme: <input type="checkbox" name="recordarme[]" value="Recordarme"><br>
            <input type="submit" name="acceder" value="Acceder">
        </form>
    <?php
}
?>