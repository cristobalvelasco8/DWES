<?php
// Esta clase contiene un listado de medicos de un hospital
require_once '../modelo/Hospital.php';
require_once '../controlador/MedicoController.php';

session_start();
$medicos = array();
if (!isset($_SESSION['hospital'])) {
    header("Location:index.php");
}
if (isset($_GET['closeSession'])) {
    session_unset();
    session_destroy();
    setcookie("PHPSESSID", "", time() - 3600, "/");
    header("Location:index.php");
}
$medicos = MedicoController::getAllMedicosFromHospital($_SESSION['hospital']->nombre_H);
?>
<html>
    <head>
        <title>Listado Medicos</title>
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
            th {
                background-color: blue;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="display: flex; flex-direction: row; width: 100%;">
            <div style="display: flex; flex-direction: column; width: 50%;">
                <?php
                echo "<div><p>" . $_SESSION['hospital']->nombre_H . "</p></div>";
                echo "<p>Tlf: " . $_SESSION['hospital']->telefono . "</p>";
                echo "<p>Direccion: " . $_SESSION['hospital']->direccion . "</p>";
                ?>
            </div>
            <div style="display: flex; flex-direction: row; width: 50%; justify-content: center; align-items: center;">
                <a href="nuevaCita.php?closeSession=true">Cerrar sesion</a>
            </div>
            <div style="display: flex; flex-direction: row; width: 50%; justify-content: center; align-items: center;">
                <a href="menu.php">Inicio</a>
            </div>
        </div>
        <?php
        if ($medicos != false && count($medicos) != 0) {
            ?>
        <br>
            <table border="1" style="width: 50%; margin: auto;">
                <tr>
                    <th>Nombre</th> 
                    <th>Especialidad</th> 
                    <th>Citas</th> 
                </tr>
                <?php
                // Relleno la tabla con los medicos de esta hospital
                foreach ($medicos as $m) {
                    echo "<tr><form action='citas.php' method='POST'>";
                    echo "<td>$m->nombre</td>";
                    echo "<td>$m->especialidad</td>";
                    echo "<td><input type='hidden' name='medico' value='$m->dni'><input type='submit' name='misCitas' value='Mis Citas'></td>";
                    echo "</form></tr>";
                }
                ?>
            </table>
            <?php
        } else {
            echo "<h2 style='color: red;'>No hay medicos en este hospital</h2>";
        }
        ?>
    </body>
</html>

