<html>
    <head>
        <title>First page</title>
    </head>
   
    <body>
    <?php 
     $linktext="<Click>& you'll see";
    ?>
       <a href="secondpage.php?name=<?php echo 
       urlencode("kelvin&");?>&id=12" >
       <?php echo htmlspecialchars($linktext); ?></a>
    </body>
</html>