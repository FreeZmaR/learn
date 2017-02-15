<?php
/**
 * Created by PhpStorm.
 * User: aser
 * Date: 01.02.2017
 * Time: 16:10
 */

function requset_get($get, $post)
{
    if(isset($get['act'])){

        switch($get['act']){
            case 'join': auth_login($post);
                break;
            case 'singup': auth_singup($post);
                break;
            case 'logout': auth_logout();
                break;
            case 'itemadd': addToBasket($_GET['id']);
                break;
            case 'dell_basket': dellBasket($_GET['id_item']);
                break;
            default: break;
        }
    }
    if(isset($get['page'])){
        //выборка страници
        switch($get['page']){
            case 'basket': if(array_key_exists('user', $_SESSION)){
                $pagename = 'basket';
            }else{
                $pagename = 'auth_login';
            }break;
            default: $pagename = $get['page'];
            break;
        }
    }else{
        $pagename = 'index';
    }
 return $pagename;
}