<html>
    <title>type casting</title>
    <body>
        <?php
        $var1="2 brown foxes";
        $var2+=$var1+3;
        echo $var1;
         ?>
        <?php
        echo gettype($var1) ;echo "</br>";
        echo gettype($var2) ;echo "</br>";
        echo settype($var2,"string") ;
        echo gettype($var2) ;echo "</br>";
        $var3=(int)$var1;
        echo gettype($var3) ;echo "</br>";
        
         ?>
         <?php echo is_array($var1);?></br>
         <?php echo is_bool($var1);?></br>
         <?php echo is_float($var1);?></br>
         <?php echo is_int($var1);?></br>
         <?php echo is_null($var1);?></br>
         <?php echo is_numeric($var1);?></br>
         <?php echo is_string($var1);?></br>
    </body>
</html>