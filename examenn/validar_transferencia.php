<?php
session_start();
require_once './Controlador/controladorCuentas.php';
require_once './Controlador/controladorUsuario.php';
require_once './Controlador/controladorTransferencia.php';

$positivo = true;
if (isset($_POST['cerrar'])) {
    if (!isset($_SESSION['nombre'])) {
        header("Location:index.php");
    } else {
        setcookie(session_name(), "", time() - 3600, "/");
        session_unset();
        session_destroy();
        header("Location:index.php");
    }
}

if (isset($_POST['inicio'])) {
    header("Location:inicio_cliente.php");
}


if (isset($_POST['confirmar'])) {
    $cuenta1 = new Cuenta();
    $cuenta1->nuevaCuenta($_POST['iban_origen'], $_POST['saldo_posterior'], $_SESSION['dni']);
    controladorCuentas::restarSaldo($cuenta1);
    controladorCuentas::sumarSaldo($_POST['iban_destino'], $_POST['cantidad']);
    $transferencia = new Transferencia();
    $fecha = time();
    $transferencia->nuevaTransferencia($_POST['iban_origen'], $_POST['iban_destino'], $fecha, $_POST['cantidad']);
    controladorTransferencia::insertar($transferencia);
    
 $Message = urlencode("Transferencia validada correctamente");
header("Location:inicio_cliente.php?Message=".$Message);

}
?>
<html>
    <head>
        <title>Trasferencias</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Hola <?php echo $_SESSION['nombre']; ?></h1>
            <form action="" method="post">
                <button type="submit" name="cerrar" class="btn btn-dark">Cerrar sesión</button <br>
                <button type="submit" name="inicio" class="btn btn-dark">Inicio</button>
            </form>
            <h1>Tramitar transferencia</h1>
            <form class="form-vertical" action="" method="POST">
                <div class="form-group">

                    Origen: <input class="form-control" type="text" name="iban_origen" value="<?php echo $_SESSION['iban_origen']; ?>" readonly>
                    <br>
                    Destino: <input class="form-control" type="text" name="iban_destino" value="<?php echo $_SESSION['iban_destino']; ?>" readonly>
                    <br>
                    Cantidad: <input class="form-control" type="text" name="cantidad" value="<?php echo $_SESSION['cantidad']; ?>" readonly>
                    <br>
                    Saldo anterior: <input class="form-control" type="text" name="saldo" value="<?php echo $_SESSION['saldo']; ?>" readonly>
                    <br>
                    Comisión: <input class="form-control" type="text" name="comision" value="<?php echo $_SESSION['comision']; ?>" readonly>
                    <br>
                    Saldo posterior:<input class="form-control" type="text" name="saldo_posterior" value="<?php echo $_SESSION['saldo_posterior'] ?>" readonly>
                    <br>
                    <br>
                    <button type="submit" name="confirmar" class="btn btn-dark" <?php
?>>Confirmar</button>


                </div>
            </form>
            <form action="transferencias.php">
                <button type="submit" name="volver" class="btn btn-dark">Volver</button>
            </form>
        </div>
    </body>
</html>

