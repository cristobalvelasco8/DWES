<?php
        session_name("Antonio");
  session_start();
  echo $_SESSION['dni'];
  session_unset();
  session_destroy();
  setcookie("Antonio","", time()-100, "/");
  header("Location:session1.php");
 
  ?>

