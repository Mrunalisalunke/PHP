<html>
    <head>
        <title>Second page</title>
    </head>
    <body>
      <?php 
      print_r($_GET);
      $id=$_GET['id'];
      $name=urldecode($_GET['name']);
      echo  "</br><strong>".$id.": .{$name} .</strong>";
      //echo $id;
      ?>
      <?php
      $string="mrunali";
      echo urlencode($string);echo"</br>";
      echo rawurlencode($string);
      ?>
    </body>
</html>