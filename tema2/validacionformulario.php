<head>
    <meta charset="UTF-8"
          <title></title>

</head>
<?php
$errorNombre = false;
$errorApellido = false;
$errorCurso = false;
if (isset($_POST ['enviar'])) {
    if ($_POST ['nombre'] != 'Antonio') {
        $errorNombre = true;
        }
        if (empty($_POST ['apellidos'])) {
            $errorApellido = true;
        }
        if(isset($_POST ['curso'])) {
            $errorCurso = true;
            
        }
            
        }
        


       if (isset ($_POST ['enviar']) && !$errorNombre && !$errorApellido && !$errorCurso){
           
        echo "Nombre: " . $_POST['nombre'] . "<br>";
        echo "Apellidos: " . $_POST['apellidos'] . "<br>";
        echo "Curso: <br>";
        foreach ($_POST ['curso'] as $c) {
            echo $c . "<br>";
        }


        echo "<a href=" . $_SERVER['PHP_SELF'] . ">Volver</a>";
           
       }
       else {
           
       
   
     
    ?>
    <form action="" method="POST">
       Nombre:<input type="text"   name="nombre" value="<?php if (!$errorNombre && isset ($_POST ['enviar'])) {echo $_POST['nombre'];} ?>" > 
         <?php if ($errorNombre) {echo "El nombre es incorrecto"; }?><br>
        Apellidos:<input type="text"   name="apellidos" value="<?php if (!$errorApellido && isset ($_POST ['enviar'])) {echo $_POST['apellidos'];} ?>">
        <?php if ($errorApellido) {echo "El apellido es incorrecto"; }?><br>
        Curso: <?php if ($errorCurso) {echo "El curso está vació"; }?><br>
        <input type="checkbox" name="curso[]" value="DAW">DAW <?php if (!$errorCurso && (isset ($_POST ['enviar'])) && in_array("DAW", $_POST['curso'])) echo "checked=checked"; ?><br>
        <input type="checkbox" name="curso[]" value="DAM">DAM <?php if (!$errorCurso && (isset ($_POST ['enviar'])) && in_array("DAM", $_POST['curso'])) echo "checked=checked"; ?><br>
        <input type="checkbox" name="curso[]" value="ASIR">ASIR <?php if (!$errorCurso && (isset ($_POST ['enviar'])) && in_array("ASIR", $_POST['curso'])) echo "checked=checked"; ?><br>
        <input type="submit" name="enviar" value="Enviar"> 
    </form>
<?php
    }
    ?>
</body>
</html>
