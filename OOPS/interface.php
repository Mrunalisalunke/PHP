<?php 
interface Animal{
    public function communication();
}
class Dog implements Animal{
    public function communication()
    {
        return 'bark';
    }
}
class cat implements Animal{
    public function communication()
    {
        return 'meow';
    }
}
?>