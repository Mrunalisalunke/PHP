<html>
    <title>Globals</title>
    <body>
        <?php
        //using globals
        $bar="outside";
        function foo(){
            global $bar;
            $bar="inside";
        }
        foo();
        echo $bar ."</br>";
        ?>
        </br>
        <?php
        //using local variables,arguments passed
        $bar="outside";
        function foo2($bar){
            $bar="inside";
            return $bar;
        }
        $bar=foo2($bar);
        echo $bar ."</br>";
        ?>
        </br>
        <?php
        function paint($color){
            echo "the color of the room is $color";
        }
        paint("blue");
        ?>
         <?php
        function paint1($color="red"){
            echo "the color of the room is $color";
        }
        paint1("blue");
        ?>
        
    </body>
</html>