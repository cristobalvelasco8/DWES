<?php
if (isset($_POST['acceder'])) {
    try {
        $conex = new PDO("mysql:host=localhost;dbname=dwes;charset=utf8mb4", "dwes", "abc123.");
        $result = $conex->prepare("SELECT * FROM usuarios WHERE user = :usuario && pass = :password");
        $result->bindParam(":usuario", $_POST['usuario']);

        $passMD5 = md5($_POST['password']);
        $result->bindParam(":password", $passMD5);

        $result->execute();

        if ($result->rowCount() > 0) {
            $fila = $result->fetchObject();
            setcookie("nombreUsu", $fila->user);
            if (isset($_POST['recordar'])) {
                setcookie("usuario", $_POST['usuario'], time() + 3600);
                setcookie("password", $_POST['password'], time() + 3600);
                setcookie("recordar", $_POST['recordar'], time() + 3600);
            } else {
                setcookie("recordar", "", time() - 3600);
                setcookie("usuario", "", time() - 3600);
                setcookie("password", "", time() - 3600);
            }
            header("location: datosCookies.php");
        } else {
            $error = 'Usuario o Password incorrecta';
        }
    } catch (PDOException $ex) {
        echo 'Error: ' . $ex->getMessage();
        die();
    }
}
?>
<form action="" method="post">
    usuario: <input type="text" name="usuario" value="<?php if (isset($_COOKIE['recordar'])) echo $_COOKIE['usuario']; ?>"><br>
    password: <input type="password" name="password" value="<?php if (isset($_COOKIE['recordar'])) echo $_COOKIE['password']; ?>"><br>
    <?php if (isset($_POST['acceder'])) echo $error; ?>
    Recordar: <input type="checkbox" name="recordar" value="recordar" <?php if (isset($_COOKIE['recordar'])) echo 'checked'; ?>><br>
    <input type="submit" name="acceder" value="Acceder">
</form>