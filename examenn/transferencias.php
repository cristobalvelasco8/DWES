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


if (isset($_POST['transferir'])) {
    $saldo = controladorCuentas::verSaldo($_SESSION['dni'], $_SESSION['iban_origen']);
    $cantidad = $saldo->saldo;
    $_SESSION['cantidad'] = $_POST['cantidad'];

    $comision = $_POST['cantidad'] * 0.01;
    $_SESSION['comision'] = $comision;
    $diferencia = $_POST['saldo'] - $_POST['cantidad'] - $comision;
    $positivo = true;

    $_SESSION['iban_destino'] = $_POST['iban_destino'];
    $_SESSION['saldo_posterior'] = $diferencia;
    header("Location:validar_transferencia.php");
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
            <form action="" method="POST">
                <button type="submit" name="cerrar" class="btn btn-dark">Cerrar sesión</button <br>
                <button type="submit" name="inicio" class="btn btn-dark">Inicio</button>
            </form>
            <h1>Tramitar transferencia</h1>
            <form class="form-vertical" action="" method="POST">
                <div class="form-group">

                    Origen: <input class="form-control" type="text" name="iban_origen" value="<?php echo $_SESSION['iban_origen']; ?>" readonly>
                    <br>
                    Saldo: <input class="form-control" type="text" name="saldo" value="<?php echo $_SESSION['saldo']; ?>" readonly>
                    <br>
                    Cuentas: <select class="form-control" name="iban_destino">
<?php
$cuenta = controladorCuentas::verCuentaConUsuario();
while ($registro = $cuenta->fetchObject()) {
    ?>
                            <option value="<?php echo $registro->iban; ?>"><?php echo $registro->iban . " -- " . $registro->Nombre; ?></option>
                        <?php } ?>
                    </select>


                    <br>
                    Cantidad: <input class="form-control" type="text" name="cantidad" required="">
<?php ?>
                    <br>

                    <br>
                    <button type="submit" name="transferir" class="btn btn-dark">Transferir</button>


                </div>
            </form>

        </div>
    </body>
</html>



