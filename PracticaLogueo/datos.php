<?php
session_name("sesion");
session_start();
if (isset($_SESSION['usuario'])) {
    ?>
    <style>
        body{
            background: <?php echo $_SESSION['usuario']['colorfondo']; ?>;
            color: <?php echo $_SESSION['usuario']['colorletra']; ?>;
            text: <?php echo $_SESSION['usuario']['tipoletra']; ?>;
            font-size: <?php echo $_SESSION['usuario']['tamletra'] . "px"; ?>;
        }
    </style>
    <?php
    echo "<h1>Hola " . $_SESSION['usuario']['nombre'] . "</h1>";

    echo "<h2>Tus datos</h2>";
    ?>

    <p>Nombre: <?php echo $_SESSION['usuario']['nombre'] ?></p>
    <p>Apellidos: <?php echo $_SESSION['usuario']['apellidos'] ?></p>
    <p>Dirección: <?php echo $_SESSION['usuario']['direccion'] ?></p>
    <p>Localidad: <?php echo $_SESSION['usuario']['localidad'] ?></p>

    <form action="inicio.php">
        <input type="submit" name="volver" value="Volver">
    </form>
    <form action="index.php" method="POST">
        <input type="submit" name="cerrarsesion" value="Cerrar sesión">
    </form>
    <?php
} else {
    echo "ACCESO DENEGADO";
}
?>