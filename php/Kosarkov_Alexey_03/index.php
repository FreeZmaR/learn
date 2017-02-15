<?php 
// Задача №1
function one()//вы водим числа которые можно делить на 3 без остатка
{
    $temp = 0;
    
    while($temp < 101)
    {
        if($temp != 0)
        {
            if( ($temp % 3) == 0){
                echo $temp."  ";
                if( ($temp % 10) == 0){
                    echo "<br>";
                }
            }
        }
        $temp++;
    }
}
echo "<strong>Задача #1</strong><br>";
echo one()."<br><br>";//вы вод первой задачи 

// Задача №2
function two ()//определяем четное ли число или нет
{
    $temp = 0;
    
    do{
       if($temp != 0)
       {
           switch($temp % 2)
           {
               case 0: echo $temp." - Четное  ";
                   break;
               default: echo $temp." - Нечетное  ";
                   break;
           }
       }else{
           echo $temp." - Это ноль  ";
       }
        if($temp == 5){
            echo "<br>";
        }
        $temp++;
    }while($temp < 11);
    
}
echo "<strong>Задача #2</strong><br>";
echo two()."<br><br>";//вывод второй задачи

// Задача №3
function three ()//вы водим массив с облостями и его городами
{
    $rus  = array();
    $rus['Московская область'] = ['Москва','Химки','Люберци'];
    $rus['Омская область'] = ['Омск','Томск'];
    $rus['Пензенская область'] = ['Пенза','Заречное'];
    $rus['Рязанская область'] = ['Рязань','Сасово'];
    
    foreach( $rus as $region => $val)
    {
        echo $region." :<br>";
        foreach($val as $city)
        {
            
                echo $city." , ";
            
        }
        echo "<br><br>";
    }
    return $rus;
}
echo "<strong>Задача #3</strong><br>";
$mas = three();//вывод 3-ей задачи и передача массива для использования в 7-ой задачи

// Задача №4
function fore($words)//преводим русские буквы на английский лад
{
    
    $letter = word();
    $arr_word = mb_str_split(mb_strtolower($words,'utf-8'));//очень долго не мог решить проблему с кодировкой , что только не рпобовал
    $word = "";
    for($rus = 0; $rus < count($arr_word); $rus++)
    {
        foreach($letter as $eng => $val)
        {
            if($arr_word[$rus] == $eng){
                $word.=$val;
                
            }
        }
    }
    
    return $word;
}
echo "<strong>Задача #4</strong><br>";
echo fore("мак долнальдс")."<br>";//вывод 4-ой задачи

// Задача №5
function five($str)//заменяем в строке пробел на _ 
{
    $ret_str = "";
    $str_arr = mb_str_split($str);
    
    for($i = 0; $i < count($str_arr); $i++)
    {
        if($str_arr[$i] != " "){
            $ret_str.= $str_arr[$i];
        }else{
            $ret_str.= "_";
        }
    }
    return $ret_str;
}

// Задача №6
function six()// выводим числа от 0 до 9 без тела цикла 
{
    for($i = 0 ; $i < show_six($i, 10);$i++){     
    }
}
echo "<br><strong>Задача #6</strong><br>";
six();//вывод 6-ой задачи
echo "<br><br>";

// Задача №7
function seven($rus, $latt)//вывод города и облости в которой находиться город по первой его букве
{
    $temp = array();//будут записаны города которые подходят к условию
    
     foreach( $rus as $region => $val)
    {
        
        foreach($val as $city)
        {   
                if( mb_strtolower(mb_substr($city, 0, 1), 'utf-8') == mb_strtolower($latt, 'utf-8')){
                    $temp[] = $city; 
                }
            
        }
        
        if( count($temp) != 0 ){
            
            echo $region." :<br>";
            
            foreach( $temp as $city => $val)
            {
                echo $val." , ";
            }
            $temp = array();
            echo "<br>";
        }
    }
}
echo "<strong>Задача #7</strong><br>";
$lt = "м";//буква для поиска города регистр не важен
seven($mas, $lt);//вывод 7-ой задачи есть проблемы с кодировкой

// Задача №8
function eight($str)//обЪеденение 4 и 5 задачи 
{
    return fore(five($str));
}
echo "<br><strong>Задача #8</strong><br>";
echo eight("мак долнальдс")."<br>";//вывод 8-ой задачи , слова выводятся в нижнем регистре 

function show_six($num, $iter)//функция вывода числа для 6 задачи
{
    echo $num;//выводим число i
    
    return $iter;//возвращаем до какого числа будет работать цикл
}
function word()//функцияя с массивом букв русского илфавита и их значения на англ для 4-ой задачи
{
    $letter = array();
    $letter['а'] = "a";
    $letter['б'] = "b";
    $letter['в'] = "v";
    $letter['г'] = "g";
    $letter['д'] = "d";
    $letter['е'] = "e";
    $letter['ё'] = "yo";
    $letter['ж'] = "zh";
    $letter['з'] = "z";
    $letter['и'] = "i";
    $letter['й'] = "y";
    $letter['к'] = "k";
    $letter['л'] = "l";
    $letter['м'] = "m";
    $letter['н'] = "n";
    $letter['о'] = "o";
    $letter['п'] = "p";
    $letter['р'] = "r";
    $letter['с'] = "s";
    $letter['т'] = "t";
    $letter['у'] = "u";
    $letter['ф'] = "f";
    $letter['х'] = "h";
    $letter['ц'] = "c";
    $letter['ч'] = "ch";
    $letter['ш'] = "sh";
    $letter['щ'] = "sch";
    $letter['ъ'] = "";
    $letter['ы'] = "y";
    $letter['ь'] = "";
    $letter['э'] = "e";
    $letter['ю'] = "yu";
    $letter['я'] = "ya";
    $letter['.'] = ".";
    $letter['_'] = "_";
    
    return $letter;
}
function mb_str_split($str)//разбор строки на символы , взял в интернете так как есть проблема с кодировкой и с str_split
    {
        preg_match_all('#.{1}#uis', $str, $out);
        return $out[0];
    }
?>