<?php

interface Logger{}
 class LogToFile{
     public function execute($message){
         var_dump('log the message to a file');
     }
 }
 class LogToDatabase{
    public function execute($message){
        var_dump('log the message to a file');
    }
}
class UserController{
    protected $logger;
    public function __construct(LogToFile $logger){
        $this->logger=$logger;
    }
    public function show(){
        $user='JohnDoe';
        $this->logger->execute($user);
    }
    
}
$controller=new UserController(new LogToFile);
$controller->show();
?>