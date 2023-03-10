<h3>¿Qué jugador quieres modificar?</h3>

<form action="" method="POST">
    Jugador con DNI: <input type="text" name="dni">
    <input type="submit" name="seleccionar" value="Seleccionar">
</form>
<button value="Volver"><a href="index.php">Volver</a></button><br>

<?php
if (isset($_POST['seleccionar'])) {

    $jugadores = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');

    if ($jugadores->connect_error) {
        die("ERROR AL CONECTAR");
    }
    $result = $jugadores->query("select * from jugador where Dni = '$_POST[dni]'");

    if ($result->num_rows) { //Si se ha encontrado algún jugador con el dni escrito:
        $jugador = $result->fetch_object();
        ?>
        <h3>Datos del jugador seleccionado:</h3>
        <form action="" method="POST">
            Dni: <input disabled="" type="text" name="dni" value="<?php echo $_POST['dni'] ?>">
            Nombre: <input type="text" name="nombre" value="<?php echo $jugador->Nombre ?>"><br><br>
            Dorsal: <select name="dorsal">
                <?php
                
                for ($i = 1; $i < 12; $i++) {
                    ?> 
                    <option value='<?php echo $i ?>'  <?php if ($jugador->Dorsal == $i) echo 'selected'; ?>>
                        <?php echo $i ?> </option>;
                    <?php
                }
                ?>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <?php
            
            $posiciones = explode(",", $jugador->Posicion);
           
            ?>
            Posición: <select name="posicion[]" multiple="true">
                <option value="1" <?php if (in_array('Portero', $posiciones)) echo 'selected' ?>>Portero</option>
                <option value="2" <?php if (in_array('Defensa', $posiciones)) echo 'selected' ?>>Defensa</option>
                <option value="4" <?php if (in_array('Centrocampista', $posiciones)) echo 'selected' ?>>Centrocampista</option>
                <option value="8" <?php if (in_array('Delantero', $posiciones)) echo 'selected' ?>>Delantero</option>
            </select><br><br>

            Equipo: <input type="text" name="equipo" value="<?php echo $jugador->Equipo ?>">
            Goles: <input type="text" name="goles" value="<?php echo $jugador->Goles ?>"><br><br>
            <input type="submit" name="modificar" value="Modificar">
            <input type="hidden" name="dni1" value="<?php echo $_POST['dni'] ?>">           
        </form>
        <?php
    } else {
        
        echo '<br>No se ha encontrado ningún jugador con ese dni.';
    }
}

if (isset($_POST['modificar'])) {
    require_once 'funciones.php'; 

    if (validarNombre($_POST['nombre']) && validarDni($_POST['dni1']) && validarEquipo($_POST['equipo']) && validarGoles($_POST['goles'])) {
        $jugadores = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');

        if ($jugadores->connect_error) {
            die("ERROR AL CONECTAR");
        }
        
        $suma = 0;
        foreach ($_POST['posicion'] as $value) {
            $suma += $value;
        }
        
        $result2 = $jugadores->query("update jugador set Nombre='$_POST[nombre]', Dorsal='$_POST[dorsal]', "
                . "Posicion='$suma', Equipo='$_POST[equipo]', Goles='$_POST[goles]' where Dni='$_POST[dni1]'");

        if (!$jugadores->errno) {
            echo "<br>Se han modificado los campos correctamente";
        } else {
            $jugadores->error;
        }
    } else {
        echo '<br>No ha sido posible actualizar los datos del jugador';
    }
}