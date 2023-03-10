<?php
if (isset($_POST['insertar'])) {
    require_once 'funciones.php'; 
    $suma = 0;
   
    if (isset($_POST['posicion'])) {
        foreach ($_POST['posicion'] as $value) {
            $suma += $value;
        }
    }
   
    $dni = validarDni($_POST['dni']);
    $nombre = validarNombre($_POST['nombre']);
    $posicion = validarPosicion($suma);
    $equipo = validarEquipo($_POST['equipo']);
    $goles = validarGoles($_POST['goles']);
    $existeDni = false;
    $hayErrores = false;
   
    if (!$dni || !$nombre || !$posicion || !$equipo || !$goles) {
        $hayErrores = true; 
    }
}

if (isset($_POST['insertar']) && $dni && $nombre && $posicion && $equipo && $goles) {

    $jugadores = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
    
    if ($jugadores->connect_error) {
        die("ERROR AL CONECTAR");
    }
    $suma = 0;
    foreach ($_POST['posicion'] as $value) {
        $suma += $value;
    }
   
    $jugadores->query("select * from jugador where Dni = '$_POST[dni]'");
    if ($jugadores->affected_rows == 0) { 

        $jugadores->query("insert into jugador (Dni,Nombre,Dorsal,Posicion,Equipo,Goles) values ('$_POST[dni]','$_POST[nombre]','$_POST[dorsal]',$suma ,'$_POST[equipo]','$_POST[goles]')");

        if ($jugadores->errno) {
            echo $jugadores->error . "<br>";
        }

        if ($jugadores->affected_rows > 0) {
            echo "REGISTRO COMPLETADO<br>";
        }
    } else { 
        $existeDni = true;
        $hayErrores = true;
    }
    $jugadores->close();
}
?>

<form action="" method="POST">
    Dni: <input type="text" name="dni" value="<?php if (isset($_POST['insertar']) && $dni && $hayErrores) echo $_POST['dni'] ?>">
    <?php if (isset($_POST['insertar']) && !$dni) echo 'Has escrito un dni incorrecto' ?>
    <?php if (isset($_POST['insertar']) && $existeDni) echo 'Ya existe un jugador con ese DNI registrado.' ?><br>
    Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['insertar']) && $nombre && $hayErrores) echo $_POST['nombre'] ?>">
    <?php if (isset($_POST['insertar']) && !$nombre) echo 'Has escrito un nombre incorrecto' ?><br>
    Dorsal: <select name="dorsal">
        <?php 
        for ($i = 1; $i < 12; $i++) {
        ?>
        <option value='<?php echo $i ?>'  <?php if (isset($_POST['insertar']) && $hayErrores && $_POST['dorsal'] == $i) echo 'selected'; ?>><?php echo $i ?></option>
            <?php
        }
        ?>
    </select><br><br>
    
    Posición: <select name="posicion[]" multiple="true">
        <option value="1" <?php if (isset($_POST['posicion'])) if (isset($_POST['insertar']) && $hayErrores && in_array("1", $_POST['posicion'])) echo 'selected' ?>>Portero</option>
        <option value="2" <?php if (isset($_POST['posicion'])) if (isset($_POST['insertar']) && $hayErrores && in_array("2", $_POST['posicion'])) echo 'selected' ?>>Defensa</option>
        <option value="4" <?php if (isset($_POST['posicion'])) if (isset($_POST['insertar']) && $hayErrores && in_array("4", $_POST['posicion'])) echo 'selected' ?>>Centrocampista</option>
        <option value="8" <?php if (isset($_POST['posicion'])) if (isset($_POST['insertar']) && $hayErrores && in_array("8", $_POST['posicion'])) echo 'selected' ?>>Delantero</option>
    </select><?php if (isset($_POST['insertar']) && !$posicion) echo 'Selecciona al menos una posición' ?><br><br>
    Equipo: <input type="text" name="equipo"  value="<?php if (isset($_POST['insertar']) && $equipo && $hayErrores) echo $_POST['equipo'] ?>">
    <?php if (isset($_POST['insertar']) && !$equipo) echo 'Escribe un equipo correcto' ?><br>
    Goles: <input type="text" name="goles"  value=<?php if (isset($_POST['insertar']) && $goles && $hayErrores) echo $_POST['goles'] ?>>
    <?php if (isset($_POST['insertar']) && !$goles) echo 'Escribe una cantidad de goles' ?><br>
    <input type="submit" name="insertar" value="insertar">
</form>

<button value="Volver"><a href="Index.php">Volver</a></button><br>