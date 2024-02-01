<html>
    <title>While Loops</title>
    <body>
        <?php
        $count=0;
        while($count<=10){
            echo $count .", " ;
            $count++;
        }
        echo "</br>Count: {$count}";
        ?>
        </br>
         <?php
        $count=0;
        while($count<=10){
            if($count==5){
                echo "five";
            }
            else{
            echo $count .", " ;
            }
            $count++;
        }
        echo "</br>Count: {$count}";
        ?>
        
    </body>
</html>