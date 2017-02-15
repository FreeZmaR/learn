<?php 
require_once("../config/config.php");

//проверка на нажатие отправки формы и пустоты текстового поля
if(isset($_POST['smb']) && (trim($_POST['text']) != null)){
    //если именя не указанно то оно будет гость
    if(trim($_POST['name'] == null)){
        $name = "guest";
    }else{
        $name = $_POST['name'];
    }
    
    $text = $_POST['text'];
    //усановка времени и его фиксация во времени отправки запроса
    date_default_timezone_set('Europe/Moscow');
    $date = date("Y-m-d");
    
    $link = getLink();
    
    if($link == null){
       echo "Ошибка подключение к БД";
        exit;
    }
    //кодировка для русс символов
    mysqli_set_charset($link, "utf8");
    
    $photo_id = $_GET['id'];
    if(!is_numeric($photo_id) || ($photo_id == null)){
        echo "Ошибка";
        exit;
    }
    
    $text = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($text)));
    $query = "INSERT INTO recall (name, photo_id, text, date) values('".$name."', '".$photo_id."', '".$text."', '".$date."')";
    
    if($result = mysqli_query($link, $query)){
        echo "Отзыв успешно оставлен <br> <a href=''>Назад</a>";
    }else{
        echo "Произошла ошибка <br> <a href=''>Назад</a>";
    }
    mysqli_free_result($result);
    mysqli_close($link);
    $back = "index.php?page=view_foto&foto=".$_GET['foto']."&view=".($_GET['view']-1)."&title=".$_GET['title']."&date=".$_GET['date']."&user=".$_GET['user']."&id=".$_GET['id']."&back=".$_GET['back'];
    
    header("Location: ".$back);
}
?>