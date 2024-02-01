<html>
    <title>Arrays</title>
<body>
    <?php $array1=array(4,8,15,16,23,42); ?>
    <?php echo $array1[1];?>
    <?php $array2=array(6,"fox","dog",array("x","y","z")); ?>
    <?php echo $array2[3][1];  ?>
    <?php $array2[3]="cat";?>
    </br>
    <?php echo $array2[3];?>
    </br>
    <?php echo $array3=array("firstname"=>"mrunu","last_name"=>"salunke");?>
    <?php echo $array3["firstname"] ."" .$array3["last_name"];?>
    <?php echo $array3["firstname"]="manu"?>
</br>
<pre><?php print_r($array2); ?></pre>
</body>
</html>