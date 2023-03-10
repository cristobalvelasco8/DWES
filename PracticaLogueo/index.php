<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
            />
        <title>Document</title>
    </head>
    <body>
        <?php
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        $logueado = true;

        if (isset($_POST['cerrarsesion'])) {
            echo 'Se ha cerrado la sesión';
            session_name('sesion');
            session_start();
            session_unset();
            session_destroy();
        } else {
            session_name("sesion");
            session_start();
        }

        if (isset($_SESSION['usuario'])) {
            header('Location: inicio.php');
        }

        if (!isset($_SESSION['intentos'])) {
            $_SESSION['intentos'] = 4;
            //echo "Se han puesto los intentos a ". ($_SESSION['intentos'] - 1);
        }

        if ($_SESSION['intentos'] > 1) {

            if (isset($_POST['acceder'])) {
                try {
                    $encriptado = md5($_POST['pass']);

                    $dwes = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.', $options);
                    $result = $dwes->query("select * from perfil_usuario where user = '$_POST[usuario]' and pass = '$encriptado'");

                    if ($result->rowCount()) {
                        $fila = $result->fetch();
                        $logueado = true;
                        $_SESSION['usuario'] = array("nombre" => $fila->nombre, "apellidos" => $fila->apellidos,
                            "direccion" => $fila->direccion, "localidad" => $fila->localidad, "colorletra" => $fila->color_letra,
                            "colorfondo" => $fila->color_fondo, "tipoletra" => $fila->tipo_letra, "tamletra" => $fila->tam_letra);
                        header('Location: inicio.php');
                    } else {
                        $logueado = false;

                        if ($_SESSION['intentos'] > 1) {
                            $_SESSION['intentos'] -= 1;
                            echo 'Usuario o contraseña incorrectos, te quedan ' . ($_SESSION['intentos'] - 1) . ' intentos.';
                        } else {
                            header('Location: intentos.php');
                        }
                    }
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }
            }
            ?>
            <div id="formLogin" class="container bg-light my-5 py-4" style="width: 30%">
                <h1>Iniciar sesión</h1>
                <form action="" method="POST">
                    <label for="Usuario" class="form-label">Correo electrónico:</label>
                    <input type="text" name="usuario" id="Usuario" class="form-control"><br>
                    <label for="Contraseña" class="form-label">Contraseña:</label>
                    <input type="password" name="pass" id="Contraseña" class="form-control"><br>
                    <input type="submit" name="acceder" value="Acceder">
                </form>
                <form action="registro.php" method="POST">
                    ¿No tienes cuenta? &nbsp;<input type="submit" name="registrar" value="Registrar">
                </form>
            </div>
            <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"
            ></script>
        </body>
    </html>
    <?php
} else {
    header('Location: intentos.php');
}