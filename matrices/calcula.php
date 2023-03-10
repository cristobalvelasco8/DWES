<?php
if (isset($_POST['confirmar']) && !empty($_POST['filas'] && !empty($_POST['filas']))) { //Si ya se ha hecho una elección proceder con el programa
    require_once 'Funciones.php'; //Importar el fichero de funciones

    $matriz; //Inicializar una matriz y rellenar con números aleatorios
    for ($i = 0; $i < $_POST['filas']; $i++) {
        for ($j = 0; $j < $_POST['columnas']; $j++) {
            $matriz[$i][$j] = rand(0, 10);
        }
    }
    
    
    //Hecho esto, según se haya pulsado en el fichero Principal Matrices entrará en una opción u otra del Switch
    switch ($_GET['option']) { //Con $_GET['option'] recibimos la elección de la página principal ya que se les asignó a cada opción un valor
        case '1':
            botonVolver();
            echo '<h2>Suma de filas:</h2>';
            $sumaFilas = sumaFilas($matriz);
            mostrarArray($sumaFilas);
            mostrarMatriz($matriz);
            break;

        case '2':
            botonVolver();
            echo '<h2>Suma de columnas:</h2>';
            $sumaColumnas = sumarColumnas($matriz);
            mostrarArray($sumaColumnas);
            mostrarMatriz($matriz);
            break;

        case '3':
            botonVolver();
            echo '<h2>Suma de filas y columnas:</h2>';
            echo 'Suma total: ' . $suma = sumaTotal($matriz);
            mostrarMatriz($matriz);
            break;

        case '4':
            botonVolver();
            if ($_POST['filas'] == $_POST['columnas']) {
            echo '<h2>Suma de la diagonal principal:</h2>';
            $sumaDiagonal = sumaDiagonal($matriz);
            echo "Suma: " . intval($sumaDiagonal) . "<br>";
            mostrarMatriz($matriz);
             }  else {
                   echo 'La matriz introducida no es cuadrada.';
             }
            break;

        case '5':
            botonVolver();

                $traspuesta = traspuesta($matriz);

                echo '<h2>Matriz traspuesta:</h2>';
                 echo 'Matriz origen: <br>';
                mostrarMatriz($matriz);  
                echo "<br>";
                echo 'Matriz traspuesta: <br>';
                mostrarMatriz($traspuesta);
                echo '<br>';
                
                echo '<br>';
          
            break;

        default:
            break;
    }
    }
 else {
    ?>
    <!-- El mismo formulario sirve para todas las opciones, a partir de él se llamará al método que haga falta según se haya seleccionado en la primera página -->
    <form action="" method="POST">
        <?php
        ?>
        Numeros de filas: <input type="text " name="filas"> <br>
        Numeros de columnas: <input type="text " name="columnas"> <br><br>
        <input type="submit" name="confirmar" value="Confirmar">
    </form>
    <form action="index.php" method="POST">
        <input type="submit" name="volver" value="Volver">
    </form>

    <?php
}