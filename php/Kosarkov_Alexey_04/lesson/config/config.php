<?php
// задаем константы с путями для сайта
define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT . 'htdocs/');
define('DATA_DIR', SITE_ROOT . 'data/');
define('LIB_DIR', SITE_ROOT . 'engine/');
define('TPL_DIR', SITE_ROOT . 'templates/');

// заголовок сайта
define('SITE_TITLE', 'Урок 4');

// подключаем движок сайта
require_once(LIB_DIR . 'functions.php');

?>
