<?php
require_once './Controlador/controladorUsuario.php';

if (isset($_POST['entrar']) && isset($_POST['dni']) && isset($_POST['clave'])) {
    $usuario = controladorUsuario::buscarUsuario($_POST['dni'], $_POST['clave']);

    if ($usuario != null) {
        session_start();
        $_SESSION['dni'] = $usuario->dni;
        $_SESSION['nombre'] = $usuario->nombre;
        $_SESSION['apellidos'] = $usuario->apellidos;
        header("location:inicio_cliente.php");
    }
}
?>
<!-- comment --><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
    </head>
    <body>
    <html>
        <body>


            <form action='' method='POST'>
                <h1> FORMULARIO DE LOGUEO</h1>
                <label for='dni' >DNI:</label><br/>
                <input type='text' name='dni' id='dni' /><br/>
                <label for='password' >Contraseña:</label><br/>
                <input type='password' name='clave' id='clave' /><br/>
                <input type='submit' name='entrar' value='Entrar' />

            </div>
        </form>

    </body>
</html>

</body>
</html>
