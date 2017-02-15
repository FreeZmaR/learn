<?php 

require_once("../config/config.php");


if(isset($_GET['page'])){
    $page_name = $_GET['page'];
}else{
    $page_name = 'index';
}

$page_show = render_page(TMS_DIR."$page_name.html", $SITE_CONTENT[$page_name]);

echo $page_show;
?>