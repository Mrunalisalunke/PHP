<html>
    <title>
        For Each Loops
    </title>
    <body>
        <?php
        $array1=array(1,2,3,4,8,3,7,2);
        foreach($array1 as $age){
            echo $age . ", ";
        }
         ?>
          <?php
        foreach($array1 as $position=> $age){
            echo $position . ": " . $age . ", ";
        }
         ?>
          <?php
        $prices=array("hello i am mrunali"=>25,"manu"=>"priceless");
        if(is_int($value))
        foreach($prices as $key=>$value){
            if(is_int($value)){
                echo $key  . ": ".$value ."</br>";
            }
            else{
                echo $key  . ": ".$value ."</br>";
            }
            
        }
         ?>
    </body>
</html>