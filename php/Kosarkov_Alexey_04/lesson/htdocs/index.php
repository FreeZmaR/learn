<?php
require_once('../config/config.php');

// массив с контентом страниц
$args = [
    'index' =>
    [
        'title' => SITE_TITLE,
        'header' => 'Основная страница сайта на уроке',
        'content' =>'Контент основной страницы сайта'
    ],
    'about' =>
    [
        'title' => SITE_TITLE,
        'header' => 'Об этом сайте',
        'content' =>'Контент страницы о сайте',
        'addition' =>'Дополнительный контент о сайте'
    ]
];

// определяем имя выводимой страницы
if (isset($_GET['page'])) {
    $pageName = $_GET['page'];
} else {
    $pageName = 'index';
}

// обрабатываем шаблон
$page = renderPage("../templates/$pageName.html", $args[$pageName]);
//$page = renderPage("../templates/$pageName.html");

// выводим результат на экран
echo $page;

?>