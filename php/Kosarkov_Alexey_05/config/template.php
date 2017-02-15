<?php 
//Обрабодчик сайта
require_once("../engine/page_func.php");

//главное меню
$head_menu = [
              [
                'link' => '?page=index',
                'name' => 'Главная'
              ],
              [
                'link' => '?page=gallery',
                'name' => 'Галерея'
              ],
              [
                'link' => '?page=down_foto',
                'name' => 'Загрузить фото'
              ]];

$show_news = show_news();
//Контент сайта
$SITE_CONTENT = [
    'index' => [
        'title' => "ДЗ №4",
        'head_menu' =>  $head_menu,
        'news' => "Новости",
        'show_news' => $show_news
    ],
    'gallery' =>[
        'title' => "Галерея",
        'head_menu' => $head_menu,
    ],
    'view_foto'=> [
        'title' => "",
        'foto'
    ],
    'down_foto' => [
        'title' => "Загрузить фотографию",
        'head_menu' =>  $head_menu
    ]];


?>