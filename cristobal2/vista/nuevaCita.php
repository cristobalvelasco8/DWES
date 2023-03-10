<?php
// En esta pagina se permite reservar cita con un medico de un hospital
// si el paciente no tiene dinero no puede reservar, caeda reserva cuesta 50$
require_once '../modelo/Hospital.php';
require_once '../controlador/PacientesController.php';
require_once '../modelo/Paciente.php';
require_once '../modelo/Medico.php';
require_once '../modelo/Atender.php';
require_once '../controlador/MedicoController.php';
require_once '../controlador/AtenderController.php';

$msg = "";
$paciente = 0;
session_start();
if (!isset($_SESSION['hospital'])) {
    header("Location:index.php");
}
if (isset($_GET['closeSession'])) {
    session_unset();
    session_destroy();
    setcookie("PHPSESSID", "", time() - 3600, "/");
    header("Location:index.php");
}
if (isset($_POST['buscar'])) {
    $paciente = PacientesController::getPaciente($_POST['nss']);
    if (!$paciente) {
        $msg = "No se encuentra el paciente";
    }
}
if (isset($_POST['nuevaCita'])) {
    $a = new Atender($_POST['medico'], $_POST['nss'], $_POST['fecha'], $_POST['hora'], $_POST['consulta'], "");
    $resultado = AtenderController::addAtender($a, $_FILES);
    if ($resultado) {
        header("Location:menu.php?cita=El paciente $_POST[nombrePac] tiene cita el dia $_POST[fecha] a la hora $_POST[hora] en la consulta $_POST[consulta]");
    }
}
?>
<html>
    <head>
        <title>Nueva Cita</title>
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
        <div>
            <form action="" method="POST">
                NSS del paciente: <input type="number" name="nss"><br>
                <input type="submit" name="buscar" value="Buscar">
            </form>
            <h2 style="color: red;"><?php echo $msg; ?></h2>
        </div>
        <?php
        if ($paciente) {
            $class = "";
            if ($paciente->saldo == 0) {
                $class = "disabled";
            }
            $medicos = MedicoController::getAllMedicosFromHospital($_SESSION['hospital']->nombre_H);
            echo "<h3>Paciente</h3><br>";
            echo "<h5>NSS: $paciente->nss</h5>";
            echo "<h5>Nombre: $paciente->nombre</h5>";
            echo "<h5>Fecha nac: $paciente->fecha_nac</h5>";
            echo "<h5>Tlf: $paciente->telefono</h5>";
            echo "<h5>Domicilio: $paciente->domicilio</h5>";
            echo "<h5>Provincia: $paciente->provincia</h5>";
            echo "<h5>Pais: $paciente->pais</h5>";
            echo "<h5>Saldo: $paciente->saldo</h5>";
            echo "<br><br>";
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <h2>Elegir medico</h2>
                <select name="medico">
                    <?php
                    foreach ($medicos as $m) {
                        echo "<option value='$m->dni'>$m->nombre-$m->especialidad</option>";
                    }
                    ?>
                </select><br>
                Consulta: <input type="number" name="consulta"><br>
                Fecha: <input type="date" name="fecha"><br>
                Hora: <input type="time" name="hora"><br>
                Adjuntar volante:<input type="file" name="img" required><br>
                <input type="hidden" name="nss" value="<?php echo $paciente->nss; ?>">
                <input type="hidden" name="nombrePac" value="<?php echo $paciente->nombre; ?>">
                <input type="submit" name="nuevaCita" value="Registrar cita" <?php echo $class; ?>>
            </form>
            <?php
        }
        ?>
    </body>
</html>

