<html>
<title>
    Pointers
</title>
<body>
<?php
    $ages=array(4,8,16,24,32);

?>
<?php echo "1: " .current($ages) ."</br>" ;
      next($ages) ;
      echo "2: " .current($ages) ."</br>" ;
      reset($ages);
      echo "3: " .current($ages) ."</br>" ;
?>
  <?php
        while($age=current($ages)){
            echo $age .", " ;
            next($ages);
        }
    ?>
</body>
</html>