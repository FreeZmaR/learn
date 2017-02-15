<?php 

require_once("../config/config.php");
$page_name = requset_get($_GET, $_POST);
$page_show = render_page(TMS_DIR."$page_name.tpl", page($page_name, $_GET));
echo $page_show;
?>