<html>
    <title>
        Switch statement
    </title>
    <body>
        <?php
        $a=3;
        ?>
        <?php 
        switch ($a){
            case 0:echo "a equal 0";
                   break;
            case 1:echo "a equals 1";
                break;
            case 2:echo "a equals 2"; break;
            case 3:echo "a equals 3"; break;
            default :echo "a is not 0, 1 ,2 or 3";  
            break;
        }
        ?>
    </body>
</html>