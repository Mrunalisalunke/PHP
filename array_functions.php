<html>
    <title>Array function</title>
    <body>
        <?php $array1=array(4,8,15,16,25,42); ?>
        Count:<?php echo count($array1)?>
        max value:<?php echo max($array1)?>
        min value:<?php echo min($array1)?>
</br>
Sort Array:<?php sort($array1);print_r($array1)?>
Reverse sort:<?php rsort($array1);print_r($array1)?>
Implode:<?php echo $string1=implode("*",$array1)?>
Explode:<?php print_r(explode("**",$string1))?>
</br>
in array:<?php echo in_array(8,$array1)?>
    </body>
</html>