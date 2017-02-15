<?php 
include_once "time.php";

$a=7;
$b=5;

function home_work_01($first, $second)
{
    if($first >=0 && $second >=0)
    {
        return ("a - b = ".minus($first, $second)."<br>"."b - a = ".minus($second, $first));
    }else if($first<0 && $second<0){
       return ("a * b = ".multy($first, $second));
    }else{
        return ("a + b = ".plus($first, $second));
    }
}


function home_work_02($a)
{
    $ret = array();
    switch($a)
    {
        case 0 :   $ret[] = 0;
        case 1 : $ret[] = 1;
        case 2 :  $ret[] = 2;
        case 3 :  $ret[] = 3;
        case 4 :  $ret[] = 4;
        case 5 :  $ret[] = 5;
        case 6 : $ret[] = 6;
        case 7 : $ret[] = 7;
        case 8 : $ret[] = 8;
        case 9 :  $ret[] = 9;
        case 10 :  $ret[] = 10;
        case 11 :  $ret[] = 11;
        case 12 :  $ret[] = 12;
        case 13 :  $ret[] = 13;
        case 14 :  $ret[] = 14;
        case 15 :  $ret[] = 15;
            break;
        default: echo 'Число или меньше 0 или больше 15';
            break;
            
    }
    return $ret;
}

              //Сложение
function plus($num1, $num2)
{
    return $num1+$num2;
}
              //Вычитание
function minus($num1, $num2)
{
    return $num1 -  $num2;       
}
              //Умножение
function multy($num1, $num2)
{
    return $num1 *  $num2;       
}
              //Деление
function div($num1, $num2)
{
    return $num1 /  $num2;       
}
     //выбор  действия + - * /        
 function mathOperation($arg1, $arg2, $operation)
{
    $operation=mb_strtolower($operation);
   switch($operation)
   {
       case plus: return plus($arg1, $arg2);
           break;
       case minus: return minus($arg1, $arg2);
           break;
       case multy: return multy($arg1, $arg2);
           break;
       case div : return div($arg1, $arg2);
       default: echo('Не правильная операция!'); return null;
           break;
   }
}
 //возведение в степень
function power($val, $pow)
{
    if($pow!=0){
        if($pow>1){
        return $val*power($val, $pow-1);
        }else {
            return $val;
        }
    }else{
        return 1;
    }
}
function time_show()
{
    date_default_timezone_set('Europe/Moscow');

    $hours = date('G');
    $minuts = date('i');
    return time_hours($hours)." ".time_minuts($minuts);
}

function print_mass($mass)
{
    return implode("<br>",$mass);
}

echo '<br>'.'<br>';
?>