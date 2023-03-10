<h1>Cookies</h1>
<?php
if (isset($_COOKIE['nombre'])){
    //echo $_COOKIE['nombre']."<br>";
    setcookie("nombre","Pepe",time()-3600);
    echo $_COOKIE['nombre']."<br>";
}
else{
setcookie("nombre","Antonio",time()+3600);
}
?>
<a href="cookie1.php" >Ir a cookie1</a>