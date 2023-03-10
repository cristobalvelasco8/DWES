<?php
// esta pagina es como el inicio.php de algunos ejercicios, es la zona principal
// se muestra en la cabezera que sirva para otras paginas botones de cerrar sesion y la info del hospital logueado
require_once '../modelo/Hospital.php';

session_start();
$cita = "";
if (!isset($_SESSION['hospital'])) {
    header("Location:index.php");
}
if (isset($_GET['closeSession'])) {
    session_unset();
    session_destroy();
    setcookie("PHPSESSID", "", time() - 3600, "/");
    header("Location:index.php");
}
if (isset($_GET['cita'])) {
    $cita = $_GET['cita'];
}
?>
<html>
    <head>
        <title>Menu</title>
    </head>
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
        </div>
        <h1 style="color: green;"><?php echo $cita; ?></h1>
        <div style="display: flex; flex-direction: column;">
            <div style="display: flex; width: 100%;">
                <a href="nuevaCita.php">Solicitar cita medica</a>
            </div>
            <div style="display: flex; width: 100%;">
                <a href="listadoMedicos.php">Consulta citas de medico</a>
            </div>
        </div>
    </body>
</html>

