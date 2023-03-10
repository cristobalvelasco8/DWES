<head>
    <meta charset="UTF-8"
          <title></title>

</head>
<?php
if (isset($_POST ['enviar'])) {
    if ($_POST ['nombre'] == "Antonio" && !empty($_POST ['apellidos']) && isset($_POST ['curso'])) {


        echo "Nombre: " . $_POST['nombre'] . "<br>";
        echo "Apellidos: " . $_POST['apellidos'] . "<br>";
        echo "Curso: <br>";
        foreach ($_POST ['curso'] as $c) {
            echo $c . "<br>";
        }


        echo "<a href=" . $_SERVER['PHP_SELF'] . ">Volver</a>";
    } else {
        ?>
        <form action="" method="POST">
            Nombre:<input type="text"   name="nombre" value="<?php if ($_POST ['nombre'] == "Antonio") echo $_POST['nombre']; ?>" >
            <?php if ($_POST ['nombre'] != "Antonio") echo "Debe introducir un nombre"; ?> <br>
            Apellidos:<input type="text"   name="apellidos" value="<?php if (!empty($_POST ['apellidos'])) echo $_POST['apellidos']; ?>" > 
            <?php if (empty($_POST ['apellidos'])) echo "Debe introducir un apellido"; ?> <br>
            Curso: <?php if (!isset($_POST['curso'])) echo "Debe marcar un curso"; ?> <br>
            <input type="checkbox" name="curso[]" value="DAW" <?php if (isset($_POST['curso']) && in_array("DAW", $_POST['curso'])) echo "checked=checked"; ?>>DAW<br>
            <input type="checkbox" name="curso[]" value="DAM" <?php if ( isset($_POST['curso']) && in_array("DAM", $_POST['curso'])) echo "checked=checked"; ?>>DAM<br>
            <input type="checkbox" name="curso[]" value="ASIR" <?php if ( isset($_POST['curso']) && in_array("ASIR", $_POST['curso'])) echo "checked=checked"; ?>>ASIR<br>
            <input type="submit" name="enviar" value="Enviar"> 
        </form>
        <?php
    }
} else {
    ?>
    <form action="" method="POST">
        Nombre:<input type="text"   name="nombre" > <br>
        Apellidos:<input type="text"   name="apellidos" > <br>
        Curso: <br>
        <input type="checkbox" name="curso[]" value="DAW">DAW<br>
        <input type="checkbox" name="curso[]" value="DAM">DAM<br>
        <input type="checkbox" name="curso[]" value="ASIR">ASIR<br>
        <input type="submit" name="enviar" value="Enviar"> 
    </form>
    <?php
}
?>
</body>
</html>
