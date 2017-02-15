<?php 

require_once("../config/config.php");


if(isset($_GET['page'])){
    $page_name = $_GET['page'];
}else{
    $page_name = 'index';
}
if($page_name == 'view_foto'){
    $SITE_CONTENT[$page_name]['foto'] = $_GET['foto'];
    $SITE_CONTENT[$page_name]['view'] = $_GET['view']+1;
    $SITE_CONTENT[$page_name]['date'] = $_GET['date'];
    $SITE_CONTENT[$page_name]['title'] = $_GET['title'];
    $SITE_CONTENT[$page_name]['user'] = $_GET['user'];
    view($_GET['id'], $_GET['view']);
}
$page_show = render_page(TMS_DIR."$page_name.html", $SITE_CONTENT[$page_name]);

echo $page_show;
?>