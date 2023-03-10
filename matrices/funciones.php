<?php

/**
 * Método usado para mostrar una matriz que se le pase por pantalla
 * @param type $matriz
 */
function mostrarMatriz($matriz){
    
    echo "<table border=1>";
    for($i = 0; $i < count($matriz); $i++){
        echo "<tr>";
        for($j = 0; $j < count($matriz[0]); $j++){
            
            echo "<td>";
            echo $matriz[$i][$j];
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

/**
 * Método usado para mostrar un array por pantalla
 * @param type $array
 */
function mostrarArray($array) {
    foreach ($array as $i => $valor) {
    }
}

/**
 * Muestra en pantalla un botón para volver al menú
 */
function botonVolver() {
    echo '<form action="index.php" method="POST">
        <input type="submit" name="volver" value="Volver">
    </form>';
}

/**
 * Suma por separado los valores de cada una de las filas de la matriz
 * @param type $matriz
 * @return array
 */
function sumaFilas($matriz) {
    $sumaFilas = Array();
    foreach ($matriz as $i => $fila) { //Con un foreach recorrer los diferentes arrays que hay en el primero
        $suma = 0;
        foreach ($fila as $j => $columna) { //Rerrorer cada uno de los arrays para obtener el contenido de cada valor
            $suma += $columna;
        
        }
        array_push($sumaFilas, $suma); //Ir acumulando en un array cada uno de los resultados
        echo 'La suma de la fila '.($i + 1).' es : '.$suma. "<br>";
    }
    return $sumaFilas;
}

/**
 * Suma por separado los valores de cada una de las columnas de la matriz
 * @param type $matriz
 * @return array
 */
function sumarColumnas($matriz){
    
    for($j = 0; $j < count($matriz[0]); $j++){
        $suma = 0;
        for($i = 0; $i < count($matriz); $i++){
            $suma += $matriz[$i][$j];  
        }
        $sumaColumna[] = $suma;
        echo 'La suma de la columna '.($j + 1).' es : '.$suma. "<br>";
    }
    return $sumaColumna;
}

/**
 * Suma cada uno de los valores de la matriz
 * @param type $matriz
 * @return type
 */
function sumaTotal($matriz){
    $suma = 0;
    for($i = 0; $i < count($matriz); $i++){
        for($j = 0; $j < count($matriz); $j++){
             $suma += $matriz[$i][$j];
        }
    }
    return $suma;
}

/**
 * Suma los valores de la matriz principal
 * @param type $matriz
 * @return type
 */
function sumaDiagonal($matriz) {
    $sumaDiagonal = 0;
    for ($i = 0; $i < count($matriz); $i++) { //Con un for recorrer los diferentes arrays que hay en el primero
        for ($j = 0; $j < count($matriz[$i]); $j++) { //Rerrorer cada uno de los arrays para obtener el contenido de cada valor
            if ($i == $j) {
                $sumaDiagonal += $matriz[$j][$i];
            }
        }
    }
    return $sumaDiagonal;
}

/**
 * Calcula la matriz traspuesta
 * @param type $matriz
 * @return type
 */
function traspuesta ($matriz){
    for ($i = 0; $i < count($matriz); $i++) {
     for ($j = 0; $j < count($matriz[0]); $j++) {
         $traspuesta[$j][$i]=$matriz[$i][$j];
        }   
    }
    return $traspuesta;
}