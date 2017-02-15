<?php 
require_once("../config/config.php");

switch($_GET['act']){
    case 'itemadd': addToBasket($_GET['id']); 
        break;
    default: break;
}

function addToBasket($item_id){
    if(count($_SESSION) == 0){
        header("Location : index.php?page=index");
        exit;
    }
    $user_id = $_SESSION['id'];
   if(!$link = getLink()){
       exit;
   } 
    mysqli_set_charset($link, "utf8");
    $date = date("Y-m-d");
    
    $query = "INSERT INTO basket (user_id, item_id, date) values('".$user_id."', '".$item_id."', '".$date."')";
    //если придмет добавился в БД то мы прикрепляем к пользователю
    if($result = mysqli_query($link, $query)){
        //mysqli_free_result($result);
        //смотрим сколько уже есть придметов в карзине у пользовотеля
        $query = "SELECT basket FROM user WHERE id='".$user_id."'";
        if($result = mysqli_query($link, $query)){
            while($row = mysqli_fetch_assoc($result)){
                $basket = $row['basket'];
            }
            mysqli_free_result($result);
        }
        //увеличиваем карзину на 1 придмет
        $basket+=1;
        //проверяем не привышает ли лимит выбраных придметов
        if(MAX_ITEM >= $basket ){
            $query = "UPDATE user SET basket='".$basket."' WHERE id='".$user_id."'";
            if($result = mysqli_query($link, $query)){
                $temp = $basket - $_SESSION['basket'];
                for($i = 0 ; $i < ($temp) ; $i++){
                   $_SESSION['basket']++; 
                }
                 header("Location : ../index.php?page=catalog");
                //mysqli_free_result($result);
            }
        }
    }
    
    mysqli_close($link);
   
}
?>