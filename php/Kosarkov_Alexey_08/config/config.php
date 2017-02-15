<?php 
//Пути к основыным папкам
define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT."htdocs/");
define('DATA_DIR', SITE_ROOT."data/");
define('LIB_DIR', SITE_ROOT."engine/");
define('TMS_DIR', SITE_ROOT."templates/");
define('MAX_ITEM', 5);
session_start();


require_once(LIB_DIR."upload_lib.php");

?>