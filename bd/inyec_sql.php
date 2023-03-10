<form action="" method="POST">
    Usuario:<input type="text" name="usu"><br>
    Clave:<input type="password" name="pass"><br>
    <input type="submit" name="enviar" value="Consulta SQL"><br>
    <input type="submit" name="enviar2" value="Consulta PEPARADA"><br>
</form>
<?php
if (isset($_POST['enviar'])) {
    $dwes = new mysqli("localhost", "dwes", "abc123.", "dwes");
    $result = $dwes->query("SELECT * FROM usuarios WHERE user='$_POST[usu]' && pass='$_POST[pass]'");
    if ($result->num_rows > 0)
        echo "HAS ENTRADO EN LA APLICACION";
    else
        echo "<br> DATOS INCORRECTOS<br>";
    $dwes->close();
}


if (isset($_POST['enviar2'])) {
    $dwes = new mysqli("localhost", "dwes", "abc123.", "dwes");
    $stmt = $dwes->stmt_init();
    $stmt->prepare("SELECT * FROM usuarios WHERE user=? && pass=?");
    $stmt->bind_param('ss', $_POST['usu'], $_POST['pass']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
        echo "HAS ENTRADO EN LA APLICACION";
    else
        echo "<br> DATOS INCORRECTOS<br>";
    $dwes->close();
}

//hola' or'1'='1 esto es la contraseña para entrar en la colsulta sql sin la contraseña antonio