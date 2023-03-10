
<form action="" method="POST">
    Nombre de usuario:<input type="text" name="usu"><br>
    Nombre de usuario:<input type="password" name="pass"><br>
    Idiomas:<select multiple="" name="idiomas[]"><br>
        <option value="1">Español</option>
        <option value="2">Inglés</option>
        <option value="3">Alemán</option>
         <option value="4">Chino</option>
    </select><br>
    Estudios:
    <input type="checkbox" name="estudios[]" value="ESO">ESO<br>
    <input type="checkbox" name="estudios[]" value="BACHILLERATO">BACHILLERATO<br>
    <input type="checkbox" name="estudios[]" value="CFGM">CFGM<br>
    <input type="checkbox" name="estudios[]" value="CFGS">CFGS<br>
    <input type="checkbox" name="estudios[]" value="UNIVERSIDAD">UNIVERSIDAD<br>
    <input type="submit" name="enviar" value="Enviar">
   <br><br>
</form>
<?php

if (isset($_POST['enviar'])){
    $suma=0;
    foreach ($_POST['idiomas'] as $value) {
        $suma+=$value;
    }
    $est=implode(",", $_POST['estudios']);
    $dwes=new mysqli ("localhost","dwes","abc123.","dwes");
    if($dwes->connect_errno){
        die("ERROR");
    }
    $dwes->query("INSERT INTO usuarios (user,pass,Idiomas,Estudios) VALUES ('$_POST[usu]','$_POST[pass]', $suma,'$est')");
    if($dwes->errno){
        echo "Filas insertadas: ".$dwes->affected_rows."<br>";
    }
 else 
        
        echo $dwes->error;
        
  
}

if(isset($_POST['recuperar'])){
     $dwes=new mysqli ("localhost","dwes","abc123.","dwes");
    if($dwes->connect_errno){
        die("ERROR");
    }
    $resul=$dwes->query("SELECT * FROM  usuarios");
    while($fila=$resul->fetch_object()){
        echo "Nombre de usuario: ".$fila->user."<br>";
        echo "Pass: ".$fila->pass."<br>";
        $ido= explode(",",$fila->idiomas);
        echo "Idiomas:<br>";
        foreach ($ido as $value)
            echo $value."<br>";
        echo "Estudios: ".$fila->Estudios."<br>";
        echo "=======================<br>";
    }
    
}
