<?php 
//Пути к основыным папкам
define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT."htdocs/");
define('DATA_DIR', SITE_ROOT."data/");
define('LIB_DIR', SITE_ROOT."engine/");
define('TMS_DIR', SITE_ROOT."templates/");



//Конфигурации для подключение к базе
define("host", 'localhost');
define("db_user", 'test_user');
define("db_pw", 'pass');
define("db", 'al_kosarkov');
/*
$host = 'localhost';
$db_user = 'test_user';
$db_pw = '1234';
$db = 'al_kosarkov';
*/
//Контент сайта и обрабодчик сайта
require_once("/template.php");


?>