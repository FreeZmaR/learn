<?php 
//для работы с файлами
require_once("../engine/file.php");
require_once("../config/config.php");

$upload_dir = "img/";
$file_name = translate(basename($_FILES['pictur']['name']));
$size = $_FILES['pictur']['size'];
$type = $_FILES['pictur']['type'];
$accec_type = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
$user = $_POST['user'];//имя пользовотеля загрузивший фото
$photo_name = $_POST['photo_name'];//название фото
$user_id = "";//id пользователя если он есть в базе
$error = [];//массив с ошибками
date_default_timezone_set('Europe/Moscow');//устонавливаем часовой пояс
$time = date("Y-m-d");//массив для полученного результата после запроса
//echo "Размер: ".$size." Тип: ".$type;
//проверка на одинаковое имя
    while(file_exists($upload_dir.$file_name))
    {
        $file_name = rename_file($file_name);
    }

    if($size > 10*1000000){
        array_push($error, "Размер файла привешает 10мб: $size.kb");
    }
    if(!check_file_type($type, $accec_type)){
        array_push($error, "Не верный формат файла ! (Допустимые: jpg,jpeg,gif,png)");
    }
//подключение к базе
$link = mysqli_connect(host, db_user, db_pw, db);
    if(!$link){
        array_push($error, "Не удалось подключиться к базе данных");
    }
//делаем возможность сохранить русские символы в базу
 mysqli_set_charset($link, "utf8");
//Проверка на пустые данные о фото и пользовотеле
    if($user == null){
        $user = "Guest";
    }
    if($photo_name == null){
        $photo_name = "unknow";
    }

 if(count($error) == 0){
    if(move_uploaded_file($_FILES['pictur']['tmp_name'], $upload_dir.$file_name)){
        echo "Фаил загружен<br>";
        echo '<a href="./?page=down_foto">Назад</a>';
        resize($upload_dir.$file_name, $upload_dir."small/".$file_name, 50, 50);
        //поиск пользовотеля в базе с таким именем если есть запомним его айди
        if($result = mysqli_query($link, "SELECT Id, Name FROM user")){
            while($row = mysqli_fetch_assoc($result)){
               if($row['Name'] == $user){
                   $user_id = $row['Id'];
               }
            }
            
            mysqli_free_result($result);
        }
       
        //если нет такого пользовотеля то мы его добавим и найдем его айди
        if($user_id == null){
            $query = "INSERT INTO user (Name) values('".$user."')";
            if(mysqli_query($link, $query)){
                if($result = mysqli_query($link, "SELECT Id, Name FROM user")){
                    while($row = mysqli_fetch_assoc($result)){
                        if($row['Name'] == $user){
                            $user_id = $row['Id'];
                        }
                    }
                }
            }else{
                echo "Ошибка добавление нового пользователя";
                exit;
            }
        }
        
        //добавим информаци от фото в базу
        $query = "INSERT INTO photo (User_id, Name, Big_size, Small_size, View, Date) values('".$user_id."', '".$photo_name."', '".$upload_dir.$file_name."', '".$upload_dir."small/".$file_name."', '0', '".$time."')";
        if(mysqli_query($link, $query)){
            echo "<br><strong color:green>Успешно загруженно в базу</strong>";
        }else{
            echo "Ошибка добавление фото в базу";
            exit;
        }
        
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
mysqli_close($link);
?>