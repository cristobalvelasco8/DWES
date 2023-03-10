<head>
    <meta charset="UTF-8"
          <title></title>

</head>
    <form action="formulario22.php" method="POST">
        Nº Matrícula:<input type="text"   name="matricula" > <br>
        Curso:<input type="text"   name="curso" > <br>
        Precio: <input type="text"   name="precio" >  <br>
         <input type="hidden" name="nombre" value="<?php echo $_POST['nombre'] ?>">
         <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos'] ?>">
         <input type="hidden" name="idiomas" value='<?php echo json_encode($_POST['idiomas']); ?>'>
          <input type="submit" name="siguiente" value="Siguiente"> 
       
    </form>

</body>
</html>
