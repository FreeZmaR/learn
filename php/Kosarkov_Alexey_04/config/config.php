<?php 
//Пути к основыным папкам
define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT."htdocs/");
define('DATA_DIR', SITE_ROOT."data/");
define('LIB_DIR', SITE_ROOT."engine/");
define('TMS_DIR', SITE_ROOT."templates/");
//Обработчик движка сайта
require_once(LIB_DIR."page_func.php");


$head_menu = [
              'main_page' => "Главная",
              'down_file' => "Загрузить Фото"
             ];
//Контент сайта
$SITE_CONTENT = [
    'index' => [
        'title' => "ДЗ №4",
        'head_menu' =>  $head_menu,
        'foto' => "Загруженные Фотографии :",
        'show_foto' => show_foto()
    ],
    'down_foto' => [
        'title' => "Загрузить фотографию",
        'head_menu' =>  $head_menu
    ]];
?>