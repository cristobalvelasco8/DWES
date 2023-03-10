<head>
    <meta charset="UTF-8"
          <title></title>

    

</head>
<body>
    <?php
    if (isset($_POST['confirmar']))
        echo $_POST['nombre'].", su matrícula se ha realizado correctamente";
    if (isset($_POST['cancelar']))
        echo $_POST['nombre'].", su matrícula se ha cancelado";
        
        ?>
    <form action="formulario21.php" method="POST">
        Nombre:<input type="text"   name="nombre" value="<?php if(isset($_POST['cancelar'])) echo $_POST ['nombre']?>" > <br>
        Apellidos:<input type="text"   name="apellidos" value="<?php if(isset($_POST['cancelar'])) echo $_POST ['apellidos']?>"  > <br>
        Idiomas: <br>
        <input type="checkbox" name="idiomas[]" value="Ingles">Ingles<br>
        <input type="checkbox" name="idiomas[]" value="Frances">Frances<br>
        <input type="checkbox" name="idiomas[]" value="Aleman">Aleman<br>
        <input type="checkbox" name="idiomas[]" value="Chino">Chino<br>
        <input type="submit" name="siguiente" value="Siguiente"> 
    </form>

</body>
</html>
