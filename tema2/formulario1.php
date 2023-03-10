<?php
//PRIMERA PARTE DEL FORMULARIO
//Para entrar en la primera parte hay que comprobar que no se ha pulsado el boton1 o que si se ha pulsado el boton de cancelar
if (!isset($_POST['boton1']) || isset($_POST['cancelar'])) {
    ?>

    <form action="" method="POST">
        Nombre: <input type="text" name="nombre"> <br>
        Apellidos: <input type="text" name="apellidos"> <br><br>

        <input type="submit" name="boton1" value="Siguiente">
    </form>

    <?php
} else if (isset($_POST['boton1'])) { //Si ya se ha pulsado, se pasa a la segunda parte
    //SEGUNDA PARTE
    //Para entrar en la segunda parte hay que comprobar que no se ha pulsado el boton2
    if (!isset($_POST['boton2'])) {
        ?>
        <form action="" method="POST">
            Nº matrícula: <input type="text " name="matricula"> <br>
            Curso: <input type="text" name="curso"> <br>
            precio: <input type="text" name="precio"> <br><br>
            <input type="hidden" name="nombre" value=<?php echo $_POST['nombre'] ?>>
            <input type="hidden" name="apellidos" value=<?php echo $_POST['apellidos'] ?>>

            <input type="submit" name="boton2" value="Siguiente">
            <input type="submit" name="cancelar" value="Cancelar">
            <!-- Hay que ir arrastrando el valor de los botones para que no se vuelvan a cumplir las condiciones y vuelva atrás -->
            <!-- Esto es debido a que cada vez que se pulsa un botón se pierde la información anterior -->
            <input type="hidden" name="boton1" value=<?php echo $_POST['boton1'] ?>>

        </form>
        <?php
    } else if (isset($_POST['boton2'])) { //Una vez se ha pulsado lel boton2 se pasa a la tercera parte
        //TERCERA PARTE
        //Para entrar en la tercera parte hay que comprobar que no se ha pulsado el boton3
        if (!isset($_POST['boton3'])) { 
            //Mostrar los datos recogidos
            echo '<h1>Tus datos son:</h1>';
            echo "Nombre: " . $_POST['nombre'] . '<br>';
            echo "Apellidos: " . $_POST['apellidos'] . '<br>';
            echo "Nº de matrícula: " . $_POST['matricula'] . '<br>';
            echo "Curso: " . $_POST['curso'] . '<br>';
            echo "precio: " . $_POST['precio'] . '<br>';
            ?>
            <form action="" method="POST">
                <input type="submit" name="boton3" value="Siguiente">
                <input type="submit" name="cancelar" value="Cancelar">
                <!-- En este caso hay que acumular como oculto el boton1 y boton2 -->
                <input type="hidden" name="boton1" value=<?php echo $_POST['boton1'] ?>>
                <input type="hidden" name="boton2" value=<?php echo $_POST['boton2'] ?>>
                <input type="hidden" name="nombre" value="<?php echo $_POST['nombre'] ?>">

            </form>
            <?php
        } else if (isset($_POST['boton3'])) { //Si ya se ha pulsado el boton3 termina el programa
            echo $_POST['nombre'].", su matrícula se ha realizado correctamente";
                ?>
    <form action="" method="POST">
        Nombre: <input type="text" name="nombre"> <br>
        Apellidos: <input type="text" name="apellidos"> <br><br>

        <input type="submit" name="boton1" value="Siguiente">
    </form>

    <?php
            
        }
    }
}
?>