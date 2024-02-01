<html>
    <title>Continue</title>
    <body>
        <?php
         for($i=0;$i<=10;$i++){
             if($i==5){
                 continue;
             }
            echo $i . ", ";
        }
        ?>
    </body>
</html>