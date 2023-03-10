<?php

if (isset($_POST['enviar'])) { //Si ya se ha pulsado el botón enviar hay que proceder a comprobar los datos
    $nombre = false; //Inicializar variables para cada uno de los campos como false para ir comprobando los que
    $dni = false;    //estén bien para ponerlos como true
    $fecha = false;
    $edad = false;
    $email = false;

    //Comprobar uno a uno los campos mandados mediante expresiones regulares
    if (preg_match('/^[A-Z\s]{1,30}$/i', $_POST['nombre'])) { //Solo texto de menos de 30 caracteres
        $nombre = true;
    }

    if (preg_match("/^\d{8}[A-Z]{1}$/", $_POST['dni'])) { //8 digitos y 1 letra mayuscula
        $dni = true;
    }

    if (preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $_POST['fecha'])) { //dd-mm-aaaa
        $fecha = true;
    }

     if (preg_match("/^\w{1,}@\w{1,}\.[a-z]{2,3}$/", $_POST['email'])) {// texto@texto.2-3 caracteres
        $email = true;
    }
        if ($_POST['edad'] >= 18) { //digito mayor a 18
        $edad = true;
    }

    //Si tras comprobar los campos, se han puestos todos como verdadero terminar
    if ($nombre && $dni && $fecha && $edad && $email) {
        echo 'Se han validado los campos correctamente';
        
    } else { //Si no se ha validado algun campo, volver a mandar el formulario
        ?>
        <form action="" method="POST">
            Nombre: <input type="text" name="nombre" placeholder="Nombre" value=<?php if($nombre) echo $_POST['nombre']?>>
            <?php if (!$nombre) echo 'Has escrito el nombre incorrecto' ?><br> 
            DNI: <input type="text" name="dni" placeholder="Dni" value=<?php if($dni) echo $_POST['dni']?>>
            <?php if (!$dni) echo 'Has escrito el dni incorrecto' ?><br>
            Fecha de nacimiento: <input type="text" name="fecha" placeholder="dd/mm/yyyy" value=<?php if($fecha) echo $_POST['fecha']?>>
            <?php if (!$fecha) echo 'Has escrito una fecha incorrecta' ?><br>
             Edad: <input type="text" name="email" placeholder="Email" value=<?php if($email) echo $_POST['email']?>>
            <?php if (!$email) echo 'Has escrito el email incorrecto' ?><br>
            
            Edad: <input type="text" name="edad" placeholder="Edad" value=<?php if($edad) echo $_POST['edad']?>>
            <?php if (!$edad) echo 'Eres menor de 18 años' ?><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
    }
} else { //Primera vez que se muestra el formulario 
    ?>
    <form action="" method="POST">
        Nombre: <input type="text" name="nombre" placeholder="Nombre"><br> 
        DNI: <input type="text" name="dni" placeholder="Dni"><br>
        Fecha de nacimiento: <input type="text" name="fecha" placeholder="dd/mm/yyyy"><br>
        Email: <input type="text" name="email" placeholder="Email"><br>
        Edad: <input type="text" name="edad" placeholder="Edad"><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
}