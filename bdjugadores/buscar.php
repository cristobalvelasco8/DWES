<h3>¿Por qué campo te gustaría buscar?</h3>
<form action="" method="POST">
    Buscar por: <select name="campo">
        <option value="dni" <?php if (isset($_POST['seleccionar']) && $_POST['campo'] == 'dni') echo 'selected'; ?>>Dni</option>
        <option value="posicion" <?php if (isset($_POST['seleccionar']) && $_POST['campo'] == 'posicion') echo 'selected'; ?>>Posición</option>
        <option value="equipo" <?php if (isset($_POST['seleccionar']) && $_POST['campo'] == 'equipo') echo 'selected'; ?>>Equipo</option>
    </select><br>
    Introduce lo que quieras buscar: <input type="text" name="parametro">
    <input type="submit" name="seleccionar" value="Seleccionar">
</form>

<?php
if (isset($_POST['seleccionar'])) {
    require_once 'funciones.php'; 
    $jugadores = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
            $suma = 0;
            if ($jugadores->connect_error) {
                die("ERROR AL CONECTAR");
            }

    
    switch ($_POST['campo']) {
        case 'dni':
            
            $result = $jugadores->query("select * from jugador where Dni = '$_POST[parametro]'");

            if ($result->num_rows) {

                echo "Mostrando los jugadores con DNI: " . $_POST['parametro'] . "<br>";
                mostrarResultados($result);
            } else {
                echo 'No hay jugadores con ese DNI';
            }
            $jugadores->close();
            break;

        case "posicion":

            
            $result = $jugadores->query("select * from jugador where Posicion like '%$_POST[parametro]%'");

            if ($result->num_rows) {

                echo "Mostrando los jugadores con posicion: " . $_POST['parametro'] . "<br>";
                mostrarResultados($result);
            } else {
                echo 'No hay jugadores en esa posición';
            }
            $jugadores->close();
            break;

        case "equipo":

            $result = $jugadores->query("select * from jugador where Equipo = '$_POST[parametro]'");

            if ($result->num_rows) {

                echo "Mostrando los jugadores del equipo: " . $_POST['parametro'] . "<br>";
                mostrarResultados($result);
            } else {
                echo 'No hay jugadores en ese equipo';
            }
            $jugadores->close();
            break;
    }
}

echo '<br><button value="Volver"><a href="index.php">Volver</a></button>';