<?php 

require_once("../config/config.php");


if(isset($_GET['page'])){
    $page_name = $_GET['page'];
}else{
    $page_name = 'index';
}

if($page_name == 'calc')
{
    header("Location: calc.php");
}else{
$page_show = render_page(TMS_DIR."$page_name.html", page($page_name, $_GET));
}
echo $page_show;
?>