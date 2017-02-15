<?php 
require_once("../config/config.php");

if(isset($_GET['act'])){
    
   switch($_GET['act']){
       case 'join': login($_POST);
           break;
       case 'singup': singup($_POST);
           break;
       case 'logout': logout();
           break;
       default: break;
   } 
}
function login($post)
{   
    if(!$link  = getLink()){
        echo "Ошибка подключения к БД";
    }
    
    //clear_string функция в db.lib.php удаление не нужных символов
    $login = clear_string($link, $post['login']);
    //пароль сразу в хеш
    $pass = sha1(clear_string($link, $post['pass']));
    $user = []; 
    $erorr = "";
    
    if(!$login){
         exit;
    }
    if(!$pass){
         exit;
    }
    
    
    mysqli_set_charset($link, "utf8");
    
    $query = "SELECT * FROM user WHERE login='".$login."'";
    if($result = mysqli_query($link, $query)){
        while($row = mysqli_fetch_assoc($result)){
            if($row['password'] === $pass){
                foreach($row as $key => $val){
                    if($key != 'password'){
                       $user[$key] = $val; 
                    }
                }
            }else{
                $erorr = "Не верный логин/пароль";
            }
        }
        mysqli_free_result($result);
    }else{
        $erorr = "Не верный логин/пароль";
    }
       if($erorr != null){
           header("Locatin : index.php?page=auth_login");
               exit;
       }
    foreach($user as $key => $val){
        $_SESSION[$key] = $val;
    }

    header("Location: index.php?page=index");
    mysqli_close($link);
}

function singup($post)
{
    $link = getLink();
    if($link == null){
        echo "Ошибка подключение к БД";
    }
    
    mysqli_set_charset($link, "utf8");
    
    
    $erorr = [];
    
    $login = clear_string($link, $post['login']);
    $name = clear_string($link, $post['name']);
    $pass = clear_string($link, $post['pass']);
    $ret_pass = clear_string($link, $post['ret_pass']);
    $date = date("Y-m-d");
    
    if(!$login){
         exit;
    }
    if(!$name){
         exit;
    }
    if(!$pass){
         exit;
    }
    if(!$ret_pass){
        exit;
    }
    if(!$post['reg']){
       exit;
    }
    
    if($pass != $ret_pass){
        $erorr[] = "Пароли не совпадают";
    }
    if(($login == null) && ($name == null) && ($pass == null)){
        $erorr[] = "Введенные данные не верны";
    }
    
    $query = "SELECT * FROM user WHERE login='".$login."'";
    if($result = mysqli_query($link, $query)){
        while($row = mysqli_fetch_assoc($result)){
            if($row['login'] != null){
                $erorr[] = "Такой логин уже существует";
            }
        }
        mysqli_free_result($result);
    }

    if(count($erorr) == 0){
        $pass = sha1($pass);
        $query = "INSERT INTO user (login, name, password, date) values('".$login."', '".$name."', '".$pass."', '".$date."')";
        if(mysqli_query($link, $query) === true){
            
        }else{
            echo "Произошла ошибка при регистрации";
        }
        header("Location: index.php?page=auth_login");
        
    }else{
       header("Location: index.php?page=singup");
    }
    mysqli_close($link);
}
function logout()
{
    session_destroy();
    
    header("Location: index.php?page=index");
}
?>