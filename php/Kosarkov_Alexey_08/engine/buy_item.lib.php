<?php
/**
 * @param $item_id
 */
function addToBasket($item_id){
    if(!isset($_SESSION['user'])){
        header("Location : index.php?page=auth_login");
        exit;
    }else{
        $user = $_SESSION['user'];
    }
    
   if(!$link = getLink()){
       exit;
   } 
    mysqli_set_charset($link, "utf8");
    $date = date("Y-m-d");

    $query = "INSERT INTO basket (user_id, item_id, date) values('".$user['id']."', '".$item_id."', '".$date."')";
    //если придмет добавился в БД то мы обновляем карзину
    if(mysqli_query($link, $query)){
            //обновляем карзину
            $query = "SELECT id FROM basket WHERE user_id='".$user['id']."'";
            $_SESSION['user']['basket'] = null;
            if($result = mysqli_query($link, $query)){
                while($row = mysqli_fetch_assoc($result)){
                    $_SESSION['user']['basket']['id'][] = $row['id'];
                }
            }
            mysqli_free_result($result);
            $_SESSION['user']['basket']['count'] = count($_SESSION['user']['basket']['id']);
            //обновляем количество покупок одново придмета
            $query = "SELECT buy FROM items WHERE id='".$item_id."'";
            if($result = mysqli_query($link, $query)){
                while($row =  mysqli_fetch_assoc($result)){
                    $buy = $row['buy']+1;
                }
            }
            mysqli_free_result($result);
            $query = "UPDATE items SET buy ='".$buy."' WHERE id='".$item_id."'";
            if(mysqli_query($link, $query)) {
                header("Location : index.php?page=catalog");
            }
    }
    
    mysqli_close($link);
   
}
?>