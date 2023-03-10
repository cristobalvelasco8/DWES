<?php

//0->destino
//c->cantidad
//u->origen

if (isset($_GET['u']) && isset($_GET['o']) && isset($_GET['c'])) {
$datos= file_get_contents("./config.json", true);
$json = json_decode($datos);

switch ($_GET['u']) {
    case "euro";
    if ($_GET['o'] = "dolar") {
        echo json_encode($json->euroDolar * $_GET['c']);
    }
        if ($_GET['o'] = "libra") {
        echo json_encode($json->euroLibra * $_GET['c']);
    }
    break;
    
        case "dolar";
    if ($_GET['o'] = "libra") {
        echo json_encode($json->dolarLibra * $_GET['c']);
    }
        if ($_GET['o'] = "euro") {
        echo json_encode($json->dolarEuro * $_GET['c']);
    }
    break;


    case "libra";
    if ($_GET['o'] = "euro") {
        echo json_encode($json->libraEuro * $_GET['c']);
    }
        if ($_GET['o'] = "dolar") {
        echo json_encode($json->libraDolar * $_GET['c']);
    }
    break;
}

if ($_GET['u'] = $_GET['o'] ) {
    echo json_encode($_GET['c']);
}
}
