<?php 
//Пути к основыным папкам
define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT."htdocs/");
define('DATA_DIR', SITE_ROOT."data/");
define('LIB_DIR', SITE_ROOT."engine/");
define('TMS_DIR', SITE_ROOT."templates/");
define('MAX_ITEM', 5);
session_start();
require_once("/db.lib.php");
//Контент сайта и обрабодчик сайта
require_once("/template.php");
    
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