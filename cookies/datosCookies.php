<?php
if (isset($_COOKIE['nombreUsu'])) {
    setcookie("nombreUsu", "", time() - 1);
    setcookie("tiempoAcceso", time(), time() + 3600);

    if (!isset($_COOKIE['tiempoAcceso'])) {
        echo $_COOKIE['nombreUsu'] . " es la primera vez que accedes a esta página";
    } else {
        echo $_COOKIE['nombreUsu'] . " tu último acceso fue el " . date("d-m-Y", $_COOKIE['tiempoAcceso']) .
        " a las " . date("H:i:s", $_COOKIE['tiempoAcceso']);
    }
} else {
    header("location: LoginCookies.php");
}
?>
<br><br><a href="LoginCookies.php"><button>Volver atrás</button></a>

