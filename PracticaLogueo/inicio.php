<?php

session_name("sesion");
session_start();
if (isset($_SESSION['usuario'])){
    ?>
<style>
    body{
        background: <?php echo $_SESSION['usuario']['colorfondo']; ?>;
        color: <?php echo $_SESSION['usuario']['colorletra']; ?>;
        text: <?php echo $_SESSION['usuario']['tipoletra']; ?>;
        font-size: <?php echo $_SESSION['usuario']['tamletra']."px"; ?>;
    }
</style>
<?php
echo "<h1>Hola ".$_SESSION['usuario']['nombre'].", bienvenido/a.</h1>";
?>
<form action="datos.php">
    <input type="submit" name="datos" value="Consultar mis datos">
</form>
<form action="index.php" method="POST">
    <input type="submit" name="cerrarsesion" value="Cerrar sesión">
</form>
<?php 
} else {
    echo "ACCESO DENEGADO";
}

?>