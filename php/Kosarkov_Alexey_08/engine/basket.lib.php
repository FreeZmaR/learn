<?php
/**
 * Created by PhpStorm.
 * User: aser
 * Date: 03.02.2017
 * Time: 2:25
 */

function getBasket()
{
    if(isset($_SESSION['user']['basket'])) {
        $basket = $_SESSION['user']['basket'];
        $price = 0;
        $ret = [
            'price_count' => "0",
            'items' => "Карзина пуста"
        ];
        if ($basket['count'] != 0) {
            $item = [];
            $link = getLink();
            $ret['items'] = null;
            for ($i = 0; $i < $basket['count']; $i++) {
                $query = "SELECT * FROM basket WHERE id='" . $basket['id'][$i] . "'";
                if ($result = mysqli_query($link, $query)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item['date'] = $row['date'];
                        $item['id'] = $row['id'];
                        $item['price'] = getBasketPrice($link, $row['item_id']);
                        $price += $item['price'];
                        $item['name'] = getBasketName($link, $row['item_id']);
                    }
                    mysqli_free_result($result);
                }
                $ret['items'][] = $item;
            }
            mysqli_close($link);
        }
        if($price != null){
            $ret['price_count'] = $price;
        }
        return $ret;
    }else{
        return null;
    }
}
function getBasketName($link, $id)
{
    $query = "SELECT name FROM items WHERE id='".$id."'";
    if($result = mysqli_query($link, $query)){
        while($row = mysqli_fetch_assoc($result)){
            $ret = $row['name'];
        }
        mysqli_free_result($result);
    }
    return $ret;
}
function getBasketPrice($link, $id)
{
    $query = "SELECT price FROM items WHERE id='".$id."'";
    if($result = mysqli_query($link, $query)){
        while($row = mysqli_fetch_assoc($result)){
            $ret = $row['price'];
        }
        mysqli_free_result($result);
    }
    return $ret;
}
function dellBasket($id)
{
        if(!$link = getLink()){
            exit;
        }
        $query = "DELETE FROM basket WHERE id='".$id."'";
        if(mysqli_query($link, $query)){
            if(isset($_SESSION['user'])){
                $_SESSION['user']['basket'][$id] = null;
                $_SESSION['user']['basket']['count']--;
            }
            header("Location: index.php?page=basket");
        }
        mysqli_close($link);
}