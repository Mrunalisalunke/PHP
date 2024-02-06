<?php 
 abstract class Shape{
     protected $color;
     public function _construct($color){
         $this->color=$color;
     }
    protected $length=4;
     public function getArea($length,$breadth=''){
        $this->length=$length;
        $this->breadth=$breadth;
        if($breadth==''){
            return pow($this->length,2);
        }
        else{
            return $this->length*$this->breadth;
        }
      
     }
 }


 class Square extends Shape{
    protected $length=4;
   
 }
 class Rectangle extends Shape{
    protected $length=4;
    protected $breadth=4;
   

 }
 /*class Triangle extends Shape{
    protected $base=4;
    protected $height=7;
    public function getArea(){
        return .5 * $this->base * $this->height;
       }
 }
 class Circle extends shape{
    protected $radius=7;
    public function getArea(){
        return M_PI * pow($this->radius,2);
       }
 }*/
 
 
 $rectangle=new Rectangle;
 echo $rectangle->getArea(15,24);
 /*class Mother{
    public function getEyeCount(){
        return 2;
    }
 }
 class Child extends Mother{

 }
 (new Child)->getEyeCount();*/
?>