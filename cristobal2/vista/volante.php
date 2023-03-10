<?php
// Aqui se muestra el volante en una pestaña nueva del navegador
require_once '../modelo/Hospital.php';
session_start();
$img = "";
if (!isset($_SESSION['hospital'])) {
    header("Location:index.php");
}
if (isset($_GET['imgId'])) {
    $img = $_GET['imgId'];
} else {
    header("Location:citas.php");
}
?>
<html>
    <head>
        <title>Volante</title>
        <style>
            a {
                background-color: blue;
                border-radius: 4px;
                padding: 1rem;
                border: none;
                color: white;
                display: block;
                text-decoration: none;
                width: 200px;
                transition: 0.15s;
                text-align: center;
                margin: 5px 0px;
                font-weight: bolder;
                box-shadow: 2px 2px darkblue;
            }
        </style>
    </head>

    <body>
        <?php
        if (!empty($_GET['imgId'])) {
            echo "<img src = '../fotos/$img'/>";
        } else {
            echo "<h2 style='color: red;'>Imagen no disponible</h2>";
        }
        ?>
        
        <div style="display: flex; width: 50%;">
            <a href="menu.php">Inicio</a>
        </div>
    </body>
</html>
