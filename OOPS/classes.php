<?php
class Task{
    public $description;
    public $completed=false;
    public function _construct($description){
        $this->description=$description;
    }
    public function complete(){
        $this->completed=true;
    }
}
$task=new Task('Learn OOP');
$task->complete();
var_dump($task->completed);
?>