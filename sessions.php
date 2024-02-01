<?php 
session_start(); 
    
    ?>
<html>
<title>
    Session
</title>
<body>
    <?php  
    $_SESSION['first_name']="mrunu";
    $_SESSION['last_name']="salunke";
    ?>
     <?php  
      $name=$_SESSION['first_name'] . " " .$_SESSION['last_name'];
      echo $name;
    ?>
  
</body>
</html>