<?php
// Esta clase contiene todas las citas de un medico de un hospital, se muestra
// la informacion de dichas citas y un enlace para ver su volante
require_once '../modelo/Hospital.php';
require_once '../controlador/MedicoController.php';
require_once '../controlador/AtenderController.php';
session_start();
if (!isset($_SESSION['hospital'])) {
    header("Location:index.php");
}
if (!isset($_POST['medico'])) {
    header("Location:menu.php");
}
if (isset($_GET['closeSession'])) {
    session_unset();
    session_destroy();
    setcookie("PHPSESSID", "", time() - 3600, "/");
    header("Location:index.php");
}
$medico = MedicoController::getMedico($_POST['medico']);
$datos = AtenderController::getAtender($_POST['medico']);
?>
<html>
    <head>
        <title>Citas</title>
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
        <h2>Pacientes con cita del doctor: <?php echo $medico->nombre; ?></h2>
            <table border="1" style="width: 50%; margin: auto;">
            <tr>
                <th>NSS</th>
                <th>Nombre</th>
                <th>Tlf</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Nº Consulta</th>
                <th>Volante</th>
            </tr>
            <?php
            foreach ($datos as $d) {
                echo "<tr>";
                echo "<td>$d->nss</td>";
                echo "<td>$d->nombre</td>";
                echo "<td>$d->telefono</td>";
                echo "<td>$d->fecha</td>";
                echo "<td>$d->hora</td>";
                echo "<td>$d->consulta</td>";
                echo "<td><a target='blank' href='volante.php?imgId=$d->volante'>Ver volante</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
