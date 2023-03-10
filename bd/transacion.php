<!-- Ejercicio: Transacción con MySQLi -->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>transacción</title>
</head>
<body>
<?php
 $conex= new mysqli("localhost", "dwes", "abc123.", "dwes",);
 if(!$conex->connect_errno){
     die("ERROR AL CONECTAR EL SERVIDOR");
 }
$conex->autocommit(false);
$error1=$conex->query('UPDATE stock SET unidades=1 WHERE tienda=1 && producto="3DSNG');
$error2=$conex->query('INSERT INTO stock VALUES ("3DSNG",3,1)');
if($error1 && $error2){
    echo "OPERACION CORRECTA";
    $conex->commit();
}
else {
    echo "ERROR EN EL SERVIDOR DE BD".$conex->error;
    $conex->rollback();
}

$conex->autocomit(true);
$conex->close();


?>
</body>
</html>