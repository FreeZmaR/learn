<?php 
//Обрабодчик сайта
require_once("../engine/page_func.php");

function getSiteContent(){
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
              ],
              [
                'link' => '?page=catalog',
                'name' => 'Каталог товаров'
              ],
              [
                'link' => '?page=calc',
                'name' => 'Калькулятор'
              ]];

$show_news = get_foto();
$show_foto = show_foto();   
//Контент сайта
$SITE_CONTENT = [
    'index' => [
        'title' => "ДЗ №6",
        'head_menu' =>  $head_menu,
        'news' => "Новости",
        'show_news' => $show_news
    ],
    'gallery' =>[
        'title' => "Галерея",
        'head_menu' => $head_menu,
        'show_foto' => $show_foto
        
    ],
    'catalog' =>[
        'title' => "Каталог",
        'head_menu' => $head_menu,
        'show_foto' => $show_foto
    ],
    'view_foto'=> [
        'show_recall' => " "
    ],
    'down_foto' => [
        'title' => "Загрузить фотографию",
        'head_menu' =>  $head_menu
    ]];
return $SITE_CONTENT;
}
function get_view_foto_content($get)
{
    return $arr = [
      'foto' => $get['foto'],
      'view' => $get['view']+1,
      'date' => $get['date'],
      'title' => $get['title'],
      'user' => $get['user'],
      'back' => $get['back'],
      'id' => $get['id'],
      'show_recall' => show_recall($get['id']),
      'inform' => get_info($get['id'])  
    ];
    
}
?>