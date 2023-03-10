<?php
// Esta clase contiene el formulario de logueo
require_once '../modelo/Hospital.php';
require_once '../controlador/HospitalController.php';
$msg = "";
$intentos = 0;
if (isset($_POST['enviar'])) {
    $msg = HospitalController::logIn($_POST);
}
?>
<html>
    <head>
        <title>Index</title>
         <style>
        a {
            background-color: blue;
            border-radius: 4px;
            padding: 1rem;
            border: none;
            color: white;
            display: block;
            text-decoration: none;
            width: 200px;
            transition: 0.15s;
            text-align: center;
            margin: 5px 0px;
            font-weight: bolder;
            box-shadow: 2px 2px darkblue;
        }
    </style>
    </head>
    
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            Usuario:<input type="text" name="usuario"><br>
            Clave:<input type="password" name="pass"><br>
            <input type="submit" name="enviar" value="Aceptar">
        </form>
        <h2 style="color: red;"><?php echo $msg; ?></h2>
    </body>
</html>
