<?php
/**
 * User: aser
 * Date: 15.02.2017
 * Time: 18:32
 */
class Ball{
    //цена
    private $price = 1500;
    //количество в наличии
    private  $count = 10;
    //метод получения цены на данный момент
    public function getPrice()
    {
        return $this -> price;
    }
    //установка новый цены
    public function  setPrice($newPrice){
        $this->price = $newPrice;
    }
    //получение количество придмета в наличии
    public function getCount(){
        return$this->count;
    }
    //установка нового количества
    public function setCount($newCount){
        $this->count = $newCount;
    }
    //покупка придмета , $lot - количество придметов
    public function buy($lot){
        if($lot < $this -> count){
            $this -> count = $this->count - $lot;
        }
    }
}
//наследуем все методы класса Ball
class Shoes extends Ball {
    private $price = 2500;
    private $count = 4;
}

class A {
    public function foo () {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A ();
$a2 = new A ();
$a1 -> foo ();
$a2 -> foo ();
$a1 -> foo ();
$a2 -> foo ();