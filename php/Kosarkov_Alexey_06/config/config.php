<?php 
//Пути к основыным папкам
define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT."htdocs/");
define('DATA_DIR', SITE_ROOT."data/");
define('LIB_DIR', SITE_ROOT."engine/");
define('TMS_DIR', SITE_ROOT."templates/");

require_once("/db.lib.php");


/*
$host = 'localhost';
$db_user = 'test_user';
$db_pw = '1234';
$db = 'al_kosarkov';
*/
//Контент сайта и обрабодчик сайта
require_once("/template.php");

function page($page, $get)
{
    $SITE_CONTENT = getSiteContent();
    switch($page){
        case 'view_foto': $SITE_CONTENT['view_foto'] = get_view_foto_content($get);
            view($get['id'], $get['view']);
            return $SITE_CONTENT['view_foto'];
        default: return $SITE_CONTENT[$page];
    }
}

?>