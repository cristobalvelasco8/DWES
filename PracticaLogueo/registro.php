

<?php
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$logueado = true;

session_name("sesion");
session_start();

if (isset($_POST['registro'])) {
    try {
        $encriptado = md5($_POST['pass']);

        $dwes = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.', $options);
        $result = $dwes->exec("insert into perfil_usuario values ('$_POST[nombre]','$_POST[apellidos]', "
                . "'$_POST[direccion]','$_POST[localidad]','$_POST[correo]','$encriptado', "
                . "'$_POST[color_letra]','$_POST[color_fondo]','$_POST[fuente]', "
                . "'$_POST[tam_letra]')");

        if ($result > 0) {
            $_SESSION['usuario'] = array("nombre" => $_POST["nombre"], "apellidos" => $_POST['apellidos'],
                "direccion" => $_POST['direccion'], "localidad" => $_POST['localidad'], "colorletra" => $_POST['color_letra'],
                "colorfondo" => $_POST['color_fondo'], "tipoletra" => $_POST['fuente'], "tamletra" => $_POST['tam_letra']);
            header('Location: inicio.php');
        } else {
            echo 'HA HABIDO UN ERROR';
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
}
?>

<h1>REGISTRO</h1>
<form action="" method="POST">
    Nombre: <input type="text" name="nombre"><br>
    Apellidos: <input type="text" name="apellidos"><br>
    Direccion: <input type="text" name="direccion"><br>
    Localidad: <input type="localidad" name="localidad"><br>
    Correo: <input type="text" name="correo"><br>
    Contraseña: <input type="password" name="pass"><br>
    Color de la fuente: <input type="color" name="color_letra">
    Color del fondo: <input type="color" name="color_fondo"><br>
    Fuente: <select name="fuente">
        <option value="times new roman">Times New Roman</option>
        <option value="arial">Arial</option>
        <option value="comic sans">Comic Sans</option>
        <option value="constantia">Constantia</option>
    </select>
    Tamaño de letra: <select name="tam_letra">
        <?php
        for ($i = 8; $i <= 20; $i += 2) {
          echo '<option value="' . $i . '">' . $i . '</option>';  
        }
        ?>

    </select><br>
    <input type="submit" name="registro" value="Registrarse">
</form>
<form action="index.php" method="POST">
    <input type="submit" name="volver" value="Volver">
</form>
            
