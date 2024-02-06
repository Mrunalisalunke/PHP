<?php class Person{
    public $name;
    public $age;
    public function _construct($name){
       $this->name=$name;
    }
    public function setAge($age){
        if($age<18){
            throw new Exception("Person is not old enough.");
        }
        $this->age=$age;
    }
    public function getAge(){
          return $this->age*365;
    }

}
$john=new Person('John Doe');
$john->setAge(30);
var_dump($john->getAge());
?>