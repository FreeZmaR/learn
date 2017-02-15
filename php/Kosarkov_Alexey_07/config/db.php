<?php 

//Конфигурации для подключение к базе
define("host", 'localhost');
define("db_user", 'test_user');
define("db_pw", 'pass');
define("db", 'al_kosarkov_06');

function getLink()
{
    $link = mysqli_connect(host, db_user, db_pw, db);
    if($link){
        return $link;
    }else{
        return null;
    }
}
function clear_string($link, $str)
{
    return trim(mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($str))));
}
?>