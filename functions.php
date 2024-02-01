<html>
    <title>Functions</title>
    <body>
        <?php
        function say_hello(){
            echo "hello world </br>";
        }
        say_hello();
        function say_hello2($word){
            echo "hello {$word}</br>";
        }
        say_hello2("world");
        say_hello2("everyone");
        $name="mrunu";
        say_hello($name);

        function say_hello3($greeting,$target,$punctuation){
            echo $greeting .", ". $target .", ".$punctuation;
        }
        say_hello("hello",$name,"!");
        ?>
        </br>
        <?php
        function addition($a,$b){
            $sum=$a+$b;
            return $sum;
        }
        echo addition(3,4);
        if(addition(5,6)==11){
            echo "yes";
        }
        ?>
         <?php
        function add_sub($a,$b){
            $sum=$a+$b;
            $sub=$a-$b;
            $result=array($sum,$sub);
            return $result;
            
        }
        $result1=add_sub(10,4);
        echo $result1[0];
        echo $result1[1];
        ?>
        }
    </body>
</html>