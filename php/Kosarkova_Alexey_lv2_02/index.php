<?php
abstract class Product
{
    //функциия для расчета стоимости прердоного кол. товара
    abstract  protected function pricing();
    function howMatch()
    {
        echo $this->pricing();
    }

}
//Класс электронной книги
class EclectroBook extends Product
{
    private $price = 800;
    private $lot_item = 1;
    function __construct($lotItem)
    {
        if( $lotItem > 0 ){
            $this->lot_item = $lotItem;
        }
    }

    protected function pricing()
    {
        return "Электронная Книга: ".$this->lot_item."шт ".($this->price * $this->lot_item)." руб";
    }
}

class Book extends Product
{
    private $price = 1200;
    private $lot_item = 1;
    function __construct($lotItem)
    {
        if( $lotItem > 0 ){
            $this->lot_item = $lotItem;
        }
    }

    protected function pricing()
    {
        return "Книга: ".$this->lot_item."шт ".($this->price * $this->lot_item)." руб";
    }
}

class Banana extends Product
{
    private $price100Gram =  0.2;
    private  $gram =  100;
    function __construct($kilogram)
    {
        $this->gram = $kilogram*1000;
    }

    protected  function  pricing()
    {
       return "Бананы: ".($this->gram/1000)."кг ".($this->gram * $this->price100Gram)." руб";
    }
}

$elBook = new EclectroBook(2);
$elBook->howMatch();
echo "<br>";
$book = new Book(3);
$book->howMatch();
echo "<br>";
$banana = new Banana(5.3);
$banana->howMatch();