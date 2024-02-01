<html>
    <title>If statements</title>
    <body>
     <?php 
     $a=10;
     $b=5;
     if($a>$b){
         echo "a is larger than b";
     }
     else if($a==$b){
         echo "a is equal to b";
     }
     else{
         echo "a is smaller than b";
     };
     ?>
     <?php 
     $c=1;
     $d=20;
     if(($a>$b) && ($c>$d)){
         echo "a is larger tha b AND";
         echo "c is larger than d";
     }
     if(($a>$b) || ($c>$d)){
        echo "a is larger tha b OR";
        echo "c is larger than d";
    }
    else{
        echo "neither a is larger than b or c is larger d";
    };
     ?>
     </br>
     <?php
     if(!isset($a)){
         $a=100;
     }
     echo $a;
     ?>
     </br>
     <?php 
     if(is_int($a)){
         settype($a,"string");
     }
     echo gettype($a);
     ?>
    </body>
</html>