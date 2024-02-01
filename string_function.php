<html>
    <title>string function</title>
    <body>
        <?php 
        $firststring="it's my first string function";
        $secondstring="it's my second string function"
        ?>
        <?php 
        $thirdstring=$firststring;
        $fourthstring=$secondstring;
        echo "$thirdstring";
        echo "$fourthstring";
        ?>
        <br/>
        uppercase:<?php echo strtoupper($thirdstring) ?></br>
        lowercase:<?php echo strtolower($thirdstring) ?></br>
        uppercase first letter:<?php echo ucfirst($thirdstring) ?></br>
        uppercase words:<?php echo ucwords($thirdstring) ?></br>
        </br>
        length:<?php echo strlen($thirdstring) ?></br>
        trim:<?php echo $fourthstring =$firststring.trim($secondstring) ?></br>
        find:<?php echo strstr($thirdstring,"first") ?></br>
        replace by string:<?php echo str_replace("first","mrunu",$thirdstring) ?></br>
        </br>
        Repeat:<?php echo str_repeat($thirdstring,2) ?></br>
        make substring:<?php echo substr($thirdstring,5,10) ?></br>
        Find position:<?php echo strpos($thirdstring,"first") ?></br>
        find Character:<?php echo strstr($thirdstring,"f") ?></br>

    </body>
</html>
