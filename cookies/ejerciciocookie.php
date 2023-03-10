<?php
if (!isset($_COOKIE['acceso'])){
    setcookie("acceso", date("d-m-Y,H:i:s"));
    echo "Bienvenido a mi web";
}

else {
    setcookie("acceso", date("d-m-Y,H:i:s"));
    echo "El último acceso a la web fue " .$_COOKIE['acceso'];
}

?>