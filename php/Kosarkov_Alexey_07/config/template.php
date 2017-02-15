<?php 
//Обрабодчик сайта
require_once("../engine/page_func.php");
//главное меню
function get_menu()
{
    if(array_key_exists('name', $_SESSION)){
        $login = $_SESSION['name'];
        $reg = "Выйти";
        $auth = $reg;
        $link1 = "auth.php?act=logout";
        $link2 = "auth.php?act=logout";
    }else{
        $reg = "Регистрация";
        $auth = "Авторизация";
        $link1 = "?page=singup";
        $link2 = "?page=auth_login";
    }
    
    return $head_menu = [
    [
    'link' => '?page=index',
    'name' => 'Главная',
    'class_li' => " "
    ],
    [
    'link' => '?page=gallery',
    'name' => 'Галерея',
    'class_li' => " "
    ],
//    [
//    'link' => '?page=down_foto',
//    'name' => 'Загрузить фото',
//    'class_li' => " "
//    ],
    [
    'link' => '?page=catalog',
    'name' => 'Каталог товаров',
    'class_li' => " "
    ],
    [
    'link' => $link1,
    'name' => $reg,
    'class_li' => 'registr'
    ],
    [
    'link' => $link2,
    'name' => $auth,
    'class_li' => 'avotr'
    ]
];
}
function getSiteContent(){

$show_news = get_foto();
$show_foto = show_foto();
$new_com = get_new_com();    
$pop_com = get_pop_com(); 
$com = get_com();   
$login = get_info_auth($_SESSION);
//$price =         
    
//Контент сайта
$SITE_CONTENT = [
    'index' => [
        'title' => "ДЗ №6",
        'login' => $login,
        'head_menu' =>  get_menu(),
        'new_com' => $new_com,
        'pop_com' => $pop_com
        
    ],
    'gallery' =>[
        'title' => "Галерея",
        'login' => $login,
        'head_menu' => get_menu(),
        'show_foto' => $show_foto
        
    ],
    'catalog' =>[
        'title' => "Каталог",
        'login' => $login,
        'head_menu' => get_menu(),
        'com' => $com
    ],
    'view_foto'=> [
        'show_recall' => " "
    ],
    'singup'=> [
        'title' => "Регистрация",
        'login' => $login,
        'head_menu' => get_menu(),
        'erorr' => " "
    ],
    'auth_login'=> [
        'title' => "Авторизация",
        'login' => $login,
        'head_menu' => get_menu(),
        'erorr' => " "
    ],
    'basket'=> [
        'title' => "Авторизация",
        'login' => $login,
        'head_menu' => get_menu(),
        'price_count' => " ",
        'items' => " "
    ],
    'down_foto' => [
        'title' => "Загрузить фотографию",
        'head_menu' =>  get_menu()
    ]
];
return $SITE_CONTENT;
}

function get_info_auth($get){
    
    if(array_key_exists('name', $_SESSION)){
        return get_content("../templates/user_log.tpl", $_SESSION);
    }else{
        return [1,[]];
    }
      
}
function get_view_content($get)
{
    $login = get_info_auth($_SESSION);
    
    $arr = [
      'login' => $login,
      'head_menu' => get_menu(),
      'view' => $get['view']+1,
      'show_recall' => show_recall($get['id']),
      'inform' => get_info($get['id'])  
    ];
    foreach($get as $key => $val){
        if(!array_key_exists($key, $arr)){
            $arr[$key] = $val;
        }
    }
    if(array_key_exists("img_show", $get)){
        if($get['img_show'] != 'non'){
        $arr['img'] = $get['img_show'];
        }
    }
    return $arr;
}

?>