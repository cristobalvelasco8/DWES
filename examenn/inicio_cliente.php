<?php
session_start();
require_once './Controlador/controladorCuentas.php';
require_once './Controlador/controladorUsuario.php';
require_once './Controlador/controladorTransferencia.php';

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

?>
<html>
    <head>
        <title>Incio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <h1>Hola <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellidos'] ?></h1>
            <form action="" method="POST">
                <button type="submit" name="cerrar" class="btn btn-dark">Cerrar sesión</button>

            </form>
            <h1>Mis cuentas</h1>
            <?php
            if (isset($_GET['Message'])){
  ?><h3> <?php   echo $_GET['Message']; ?> </h3> <?php
}
?>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Cuentas</th>
                                <th>Saldo</th>
                                <th>Historial</th>
                                <th>Transferencia</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $cuentas = controladorCuentas::cuentasUsuario($_SESSION['dni']);
                            while ($registro = $cuentas->fetchObject()) {
                                echo '<tr>';
                                ?>

                            <td><?php echo $registro->iban; ?></td>
                            <td><?php echo $registro->saldo;
                                ?></td> 

                            <form action="" method="POST">
                                <td><button name="historial"  class="btn btn-dark" value="<?php echo $registro->iban; ?>">Historial</button></td>    
                            </form>
                            <form action="transferencias.php" method="post">
                                <td><button name="transferencia"  class="btn btn-dark" value="<?php
                            $_SESSION['iban_origen'] = $registro->iban;
                            $_SESSION['saldo'] = $registro->saldo;
                            echo $registro->iban;
                                ?>">Transferencia</button></td>    
                            </form>
                            <?php
                            echo '</tr>';
                        }
                        ?>


                        </tbody>
                    </table>
                </div>

            </div>
            <?php
            if (isset($_POST['historial'])) {
                ?>
                <h1>Historial</h1>
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Fecha</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $historialCuenta = controladorTransferencia::historialCuenta($_POST['historial']);
                                while ($registro = $historialCuenta->fetchObject()) {
                                    echo '<tr>';
                                    ?>

                                <td><?php echo $registro->iban_origen; ?></td>
                                <td><?php echo $registro->iban_destino; ?></td>
                                <td><?php echo $registro->fecha; ?></td>
                                <td><?php echo $registro->cantidad; ?></td>
                                <?php
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                </div>
                </body>
                </html>


