<?php
//подключение config.php
require_once ("../config/config.php");
//Подключение к БД
try{
    $link = new PDO('mysql:dbname='.DB_NAME.';host='.HOST, USER_DB, PW_DB);
}catch (Exception $exception){
    echo "Error: Could not connect. ".$exception->getMessage();
}
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
    $query = "SELECT * FROM foto";
    $result = $link->query($query);
    while($row = $result->fetchObject()){
        $data[] = $row;
    }
unset($link);
    //регистрация шаблона
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem(TMS_DIR);
    $twig = new Twig_Environment($loader);
    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'view': $template = $twig->loadTemplate('view.tpl');
                echo $template->render(array(
                    "title"=>$_GET['title'],
                    "img"=>$_GET['img']
                ));
                break;
            default:$template = $twig->loadTemplate('index.tpl');
                echo $template->render(array(
                    "title"=>"Фотографии из БД",
                    "foto"=>$data
                ));
                break;
        }
    }else{
        $template = $twig->loadTemplate('index.tpl');
        echo $template->render(array(
            "title"=>"Фотографии из БД",
            "foto"=>$data
        ));
    }
}catch (Exception $exception){
    die('ERROR: '.$exception->getMessage());
}