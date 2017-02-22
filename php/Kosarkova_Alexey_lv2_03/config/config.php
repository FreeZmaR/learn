<?php
//Пути к основыным папкам
define('SITE_ROOT', "../");
define('WWW_DIR', SITE_ROOT."htdocs/");
define('DATA_DIR', SITE_ROOT."data/");
define('LIB_DIR', SITE_ROOT."engine/");
define('TMS_DIR', SITE_ROOT."templates/");
//Подключение к ДБ
define('HOST',"localhost");
define('USER_DB',"test_user");
define('PW_DB',"pass");
define('DB_NAME',"al_kosarkov_lv2_03");

//Подключение Twig
require_once (LIB_DIR."Twig/Autoloader.php");