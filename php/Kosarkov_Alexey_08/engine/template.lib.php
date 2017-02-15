<?php


//главное меню
function get_menu()
{
    if(array_key_exists('user', $_SESSION)){
        $login = $_SESSION['user']['name'];
        $reg = "Выйти";
        $auth = $reg;
        $link1 = "?act=logout";
        $link2 = "?act=logout";
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

$show_foto = show_foto();
$new_com = get_new_com();    
$pop_com = get_pop_com(); 
$com = get_com();
$basket = getBasket();
if(array_key_exists('user', $_SESSION)) {
    $user = $_SESSION['user'];
}else{
    $user = null;
}
$login = get_info_auth($user);
//Контент сайта
$SITE_CONTENT = [
    'index' => [
        'title' => "ДЗ №6",
        'login' => $login,
        'head_menu' =>  get_menu(),
        'new_com' => $new_com,
        'pop_com' => $pop_com,
        'foot_menu' => [1,[]]
        
    ],
    'gallery' =>[
        'title' => "Галерея",
        'login' => $login,
        'head_menu' => get_menu(),
        'show_foto' => $show_foto,
        'foot_menu' => [1,[]]
        
    ],
    'catalog' =>[
        'title' => "Каталог",
        'login' => $login,
        'head_menu' => get_menu(),
        'com' => $com,
        'foot_menu' => [1,[]]
    ],
    'view_foto'=> [
        'show_recall' => " "
    ],
    'singup'=> [
        'title' => "Регистрация",
        'login' => $login,
        'head_menu' => get_menu(),
        'auth' =>  " ",
        'erorr' => " ",
        'foot_menu' => [1,[]]
    ],
    'auth_login'=> [
        'title' => "Авторизация",
        'login' => $login,
        'head_menu' => get_menu(),
        'auth' =>  " ",
        'erorr' => " ",
        'foot_menu' => [1,[]]
    ],
    'basket'=> [
        'title' => "Авторизация",
        'login' => $login,
        'head_menu' => get_menu(),
        'price_count' => $basket['price_count'],
        'items' => $basket['items'],
        'foot_menu' => [1,[]]
    ],
    'down_foto' => [
        'title' => "Загрузить фотографию",
        'head_menu' =>  get_menu(),
        'foot_menu' => [1,[]]
    ]
];
return $SITE_CONTENT;
}

function get_info_auth($get){
    
    if(array_key_exists('user', $_SESSION)){
        return get_content("../templates/user_log.tpl", $_SESSION['user']);
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
      'inform' => get_info($get['id']),
      'foot_menu' => [1,[]]
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

function page($page, $get)
{
    $SITE_CONTENT = getSiteContent();
    switch($page){
        case 'view_foto': $SITE_CONTENT['view_foto'] = get_view_content($get);
            view($get['id'], $get['view'], "photo");
            return $SITE_CONTENT['view_foto'];

        case 'view_item': $SITE_CONTENT['view_item'] = get_view_content($get);
            view($get['id'], $get['view'], "items");
            return $SITE_CONTENT['view_item'];
//        case 'singup': $SITE_CONTENT['singup']['erorr'] = get_info_auth($get);
//            return $SITE_CONTENT['singup'];

        default: return $SITE_CONTENT[$page];
    }
}
?>