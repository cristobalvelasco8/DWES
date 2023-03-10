<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset ($_POST['siguiente'])){
           echo $_POST['nombre']."<br>";
          echo $_POST['apellidos']."<br>";
          echo $_POST['matricula']."<br>";
          echo $_POST['curso']."<br>";
          echo $_POST['precio']."<br>"; 
          $idiomas= json_decode($_POST["idiomas"]);
          echo "Idiomas: <br>";
          foreach ($idiomas as $value)
              echo $value."<br>";
        
          
        ?>
        <form action="formulario2.php" method="POST">
            <input type="submit" name="confirmar" value="Confirmar">
               <input type="hidden" name="nombre" value="<?php echo $_POST['nombre'] ?>">
         <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos'] ?>">
            <input type="submit" name="cancelar" value="Cancelar">
            
        </form>
        <?php
        }
        else {
            header('Location:formulario2.php');
        }
        ?>
    </body>
</html>
