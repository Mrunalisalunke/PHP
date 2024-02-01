<html>
    <head>
        <title>Encoding</title>
    </head>
    <body>
    <?php 
    $url_image='php/created/page/url.php';
    $param1="this is a string";
    $param2='"bad"/<>character$ &';
     $linktext="<Click>& you'll see";
    ?>
    <?php 
     $url="http://localhost/";
     $url .= rawurlencode($url_page);
     $url .= "?param1=" .urlencode($param1);
     $url .= "?param2=" .urlencode($param2);

     //html special characters
    ?>
       <a href="secondpage.php?name=<?php echo 
       urlencode("kelvin&");?>&id=12" >
       <?php echo htmlspecialchars($linktext); ?></a>
    </body>
</html>