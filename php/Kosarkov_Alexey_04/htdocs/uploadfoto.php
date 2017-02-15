<?php 
//для работы с файлами
require_once("../engine/file.php");

$upload_dir = "img/";
$file_name = translate(basename($_FILES['pictur']['name']));
$size = $_FILES['pictur']['size'];
$type = $_FILES['pictur']['type'];
$accec_type = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
$error = [];
//echo "Размер: ".$size." Тип: ".$type;
//проверка на одинаковое имя
    while(file_exists($upload_dir.$file_name))
    {
        $file_name = rename_file($file_name);
    }

    if($size > 10*1000){
        array_push($error, "Размер файла привешает 10мб: $size.kb");
    }
    if(!check_file_type($type, $accec_type)){
        array_push($error, "Не верный формат файла ! (Допустимые: jpg,jpeg,gif,png)");
    }

 if(count($error) == 0){
    if(move_uploaded_file($_FILES['pictur']['tmp_name'], $upload_dir.$file_name)){
        echo "Фаил загружен<br>";
        echo '<a href="./?page=down_foto">Назад</a>';
        resize($upload_dir.$file_name, $upload_dir."small/".$file_name, 50, 50);
    }else{
        echo "Произошла ошибка<br>";
        echo '<a href="./?page=down_foto">Назад</a>';
    }
  }else{
     for($i = 0 ; $i < count($error); $i++)
     {
         echo $error[$i];
     }
     echo '<br><a href="./?page=down_foto">Назад</a>';
 }
?>