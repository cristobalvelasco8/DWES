<?php
if (isset($_POST['enviar'])) {
    if (!empty($_POST ['nombre']) && !empty($_POST ['apellidos']) && isset($_POST ['sexo']) && isset($_POST ['estado']) && isset($_POST['estudios']) && isset($_POST['aficiones'])) {
        echo 'Nombre: ' . $_POST['nombre'];
        echo '<br>Apellido: ' . $_POST['apellidos'];
        echo '<br>Sexo: ' . $_POST['sexo'];
        echo '<br>Estado civil: ' . $_POST['estado'];
        echo '<br>Estudios: ';
        foreach ($_POST['estudios'] as $value) {
            echo $value . "<br>";
        }
        echo '<br>Edad: ' . $_POST['edad'];
        echo '<br>Aficiones: ';
        foreach ($_POST['aficiones'] as $value) {
            echo $value . "<br>";
        }
        echo "<br> <a href=" . $_SERVER['PHP_SELF'] . ">Volver</a>";
    } else {
        ?>
        <html>
            <head>
                <title>Form</title>
            </head>
            <body>
                <form action="" method="POST">
                    Nombre: <input type="text " name="nombre"  value="<?php if (!empty($_POST ['nombre'])) echo $_POST['nombre']; ?>" > 
        <?php if (empty($_POST ['nombre'])) echo "<span style='color:red'> -> Debe introducir un nombre </span>"; ?> <br>
                    Apellidos: <input type="text " name="apellidos" value="<?php if (!empty($_POST ['apellidos'])) echo $_POST['apellidos']; ?>"> 
        <?php if (empty($_POST ['apellidos'])) echo "<span style='color:red'> -> Debe introducir un apellido</span>"; ?> <br><br>

                    Sexo:  <?php
                    if (isset($_POST['enviar']) && empty($_POST['sexo']))
                        echo "<span style='color:red'> -> Debe introducir una opción</span>";
                    
                ?> <br>
                    <input type="radio"  name="sexo" value="Hombre"   <?php
                    if (isset($_POST['sexo']))
                        echo 'checked="checked"';
                    ?>>Hombre 
                    <input type="radio"  name="sexo" value="Mujer"   <?php
                    if (isset($_POST['sexo']))
                        echo 'checked="checked"';
                    ?>>Mujer<br><br>

                    Estado civil:   <?php
        if (isset($_POST['enviar']) && empty($_POST['estado']))
            echo "<span style='color:red'> -> Debe introducir una opción</span>";
        ?> <br>
                    <input type="radio"  name="estado" value="Soltero"   <?php
                    if (isset($_POST['estado']))
                        echo 'checked="checked"';
                    ?>>Soltero 
                    <input type="radio"  name="estado" value="Casado"  <?php
            if (isset($_POST['estado']))
                echo 'checked="checked"';
            ?>>Casado
                    <input type="radio"  name="estado" value="Otro"  <?php
            if (isset($_POST['estado']))
                echo 'checked="checked"';
                    ?>>Otro<br><br>

                    Aficiones: <?php if (!isset($_POST['aficiones'])) echo "<span style='color:red'> -> Debe introducir una opción</span>"; ?>  <br>
                    <input type="checkbox" name="aficiones[]" value="Cine"  <?php if (isset($_POST['aficiones']) && in_array("Cine", $_POST['aficiones'])) echo "checked=checked"; ?>>Cine
                    <input type="checkbox" name="aficiones[]" value="Lectura"  <?php if (isset($_POST['aficiones']) && in_array("Lectura", $_POST['aficiones'])) echo "checked=checked"; ?>>Lectura
                    <input type="checkbox" name="aficiones[]" value="Television"  <?php if (isset($_POST['aficiones']) && in_array("Televisión", $_POST['aficiones'])) echo "checked=checked"; ?>>Television<br>
                    <input type="checkbox" name="aficiones[]" value="Deporte"  <?php if (isset($_POST['aficiones']) && in_array("Deporte", $_POST['aficiones'])) echo "checked=checked"; ?>>Deporte
                    <input type="checkbox" name="aficiones[]" value="Musica"  <?php if (isset($_POST['aficiones']) && in_array("Musica", $_POST['aficiones'])) echo "checked=checked"; ?>>Música
                    <input type="checkbox" name="aficiones[]" value="Internet"
                    <?php if (isset($_POST['curso']) && in_array("Internet", $_POST['aficiones'])) echo "checked=checked"; ?>>Internet <br> <br>

                    Estudios: 
                    <select size="5" multiple="true" name="estudios[]">
                        <option>ESO</option>
                        <option>Bachillerato</option>
                        <option>CFGM</option>
                        <option>CFGS</option>
                        <option>Universidad</option>
                    </select><br><br>

                    Edad: 
                    <select name="edad">
                        <option>Entre 1 y 14 años</option>
                        <option>Entre 15 y 25 años</option>
                        <option>Entre 26 y 35 años</option>
                        <option>Mayor de 35 años</option>
                    </select><br><br>

                    <input type="submit" name="enviar" value="Enviar">
                </form> 
            </body>
        </html>
        <?php
    }
} else {
    ?>
    <form action="" method="POST">
        Nombre: <input type="text " name="nombre">  <br>
        Apellidos: <input type="text " name="apellidos"> <br><br>

        Sexo: <br>
        <input type="radio"  name="sexo" value="Hombre">Hombre 
        <input type="radio"  name="sexo" value="Mujer">Mujer<br><br>

        Estado civil: <br>
        <input type="radio"  name="estado" value="Soltero">Soltero 
        <input type="radio"  name="estado" value="Casado">Casado
        <input type="radio"  name="estado" value="Otro">Otro<br><br>

        Aficiones: <br>
        <input type="checkbox" name="aficiones[]" value="Cine">Cine
        <input type="checkbox" name="aficiones[]" value="Lectura">Lectura
        <input type="checkbox" name="aficiones[]" value="Television">Television<br>
        <input type="checkbox" name="aficiones[]" value="Deporte">Deporte
        <input type="checkbox" name="aficiones[]" value="Musica">Música
        <input type="checkbox" name="aficiones[]" value="Internet">Internet<br><br>

        Estudios: 
        <select size="5" multiple="true" name="estudios[]">
            <option>ESO</option>
            <option>Bachillerato</option>
            <option>CFGM</option>
            <option>CFGS</option>
            <option>Universidad</option>
        </select><br><br>

        Edad: 
        <select name="edad">
            <option>Entre 1 y 14 años</option>
            <option>Entre 15 y 25 años</option>
            <option>Entre 26 y 35 años</option>
            <option>Mayor de 35 años</option>
        </select><br><br>

        <input type="submit" name="enviar" value="Enviar">
    </form> 
    <?php
}
?>