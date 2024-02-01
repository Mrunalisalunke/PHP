<html>
<title>boolean</title>
<body>
    <?php 
    $bool1=true;
    $bool2=false;

    ?>
    bool1:<?php echo $bool1 //1?></br>
    bool2:<?php echo $bool2 //nothing?></br>
</br>
<?php 
$var1=3;
$var2="cat";
$var4="0";
?>
$var1 is set:<?php echo isset($var1);?>
$var2 is set:<?php echo isset($var2);?>
$var3 is set:<?php echo isset($var3);?>
<?php unset($var1);?>
$var1 is set:<?php echo isset($var1);?>
$var2 is set:<?php echo isset($var2);?>
$var3 is set:<?php echo isset($var3);?>
</br>
$var1 empty: <?php echo empty($var1); ?>
$var4 empty: <?php echo empty($var4); ?>
</body>
</html>