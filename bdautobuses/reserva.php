

<?php

$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];


function validarFecha($fecha) {
    if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha)) { 
        return true;
    }
}

$fechaCorrecta = validarFecha($_POST['fecha']);
$actualizado = false;

$dwes = new PDO('mysql:host=localhost;dbname=autobuses;charset=utf8mb4', 'dwes', 'abc123.', $options);

if (isset($_POST['reservar'])) {


        $results = $dwes->exec("update viajes set Plazas_libres = Plazas_libres -'$_POST[reserva]' where origen='$_POST[origen]' and destino='$_POST[destino]' and fecha='$_POST[fecha]'");

        if ($results) {
            $actualizado = true;
        }

}

$consultaViaje = $dwes->query("select Plazas_libres from viajes where Fecha = '$_POST[fecha]' and Origen = '$_POST[origen]' and Destino = '$_POST[destino]'");

if (isset($_POST['consultar']) && $fechaCorrecta) {

    $fila = $consultaViaje->fetch();
    if (!$fila) {
        echo 'No se ha encontrado nigún viaje ' . $_POST['destino'] . ' - ' . $_POST['origen'] . ' en la fecha: ' . $_POST['fecha'];
    } else {
        ?>
        <form action="" method="POST">
            Fecha: <input type="text" name="fecha" value="<?php echo $_POST['fecha'] ?>" readonly> <br>
            Origen: <input type="text" name="origen" value="<?php echo $_POST['origen'] ?>" readonly> <br>
            Destino: <input type="text" name="destino" value="<?php echo $_POST['destino'] ?>" readonly> <br>
            Plazas disponibles: <input type="text" name="plazas" value="<?php echo $fila->Plazas_libres ?>" readonly> <br>
            ¿Cuántas plazas desea reservar? <select name="reserva" size="3">
                <?php
                for ($i = 1; $i <= $fila->Plazas_libres; $i++) {
                    ?>
                    <option><?php echo $i ?></option>
                    <?php
                }
                ?>
            </select><br><br>
            <input type="submit" name="reservar" value="Reservar">
            <button value="Nueva Consulta"><a href="consulta.php">Nueva Consulta</a></button><br>
            <input type="hidden" name="consultar">
        </form>    
        <?php
        if ($actualizado) {
            echo "Se han reservado" ;
        }
    }
    }
    