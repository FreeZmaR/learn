<?php 

function render_page($file, $site_content = [])
{
    //проверка на наличие шаблона и его содержимого
    if( !is_file($file) || (filesize($file) == 0) ){
        return file_get_contents(TMS_DIR."404.html");
        
    }
    
    $template = file_get_contents($file);
    $full_elem_content="";
    //проверка на наличие контента для шаблона
    if(count($site_content) != 0){
       foreach($site_content as $key => $val)
       {
           if(is_array($val) && ($val != null )){
               foreach($val as $val_key => $temp)
               {   
                   if(is_array($temp)){
                       $elem_content = file_get_contents(TMS_DIR.$key.".tpl");
                       foreach($temp as $temp_key => $temp_val)
                       {
                           $temp_key = "((".strtoupper($temp_key)."))";
                           $elem_content = str_replace($temp_key, $temp_val, $elem_content);
                       }
                       $full_elem_content .= $elem_content;
                   }else{
                       $val_key = "((".strtoupper($val_key)."))";
                       $template = str_replace($val_key, $temp, $template);
                   }
               } 
               $key = "((".strtoupper($key)."))";
               $template = str_replace($key, $full_elem_content, $template);
               $full_elem_content = null;
           }else if($val != null){
               $key = "((".strtoupper($key)."))";
               $template = str_replace($key, $val, $template);
           }
         
       }
    }
    return $template;
}
  
function get_foto()
{
    $arr = [
        'id' => "",
        'user_id' => "",
        'user_name' => "",
        'name' => "",
        'big_size' => "",
        'small_size' => "",
        'date' => "",
        'view' => ""
    ];
    $ret_arr = [];
    $link = mysqli_connect(host, db_user, db_pw, db);
     mysqli_set_charset($link, "utf8");
    if(!$link){
       exit; 
    }
    $user_id = "";
    $query = "SELECT * FROM photo";
    if($result = mysqli_query($link, $query)){
        while($row = mysqli_fetch_assoc($result)){
            foreach($row as $key => $val)
            {
                if(array_key_exists($key, $arr)){ 
                    $arr[$key] = $val;
                }
            }
            array_unshift($ret_arr, $arr);
        }
        mysqli_free_result($result);
    }
    
    for($i = 0; $i < count($ret_arr);$i++)
    {
        foreach($ret_arr[$i] as $key => $val)
        {
            if($key == 'user_id'){
                if($result = mysqli_query($link, "SELECT * FROM user WHERE id=".$val)){
                    while($row = mysqli_fetch_assoc($result)){
                        $ret_arr[$i]['user_name'] = $row['name'];
                    }
                    mysqli_free_result($result);
                }
            }
        }
    }
    mysqli_close($link);
    
    return $ret_arr;
}
function show_foto()
{
    $arr = [
        'id' => "",
        'user_id' => "",
        'user_name' => "",
        'name' => "",
        'big_size' => "",
        'small_size' => "",
        'date' => "",
        'view' => "",
        'size' => 590
    ];
    $ret_arr = [];
    $link = mysqli_connect(host, db_user, db_pw, db);
    if(!$link){
        echo "Ошибка подключение к базе";
        exit;
    }
    mysqli_set_charset($link, "utf8");
    $query = "SELECT * FROM photo ORDER BY view DESC";
    if($result = mysqli_query($link, $query)){
        while($row = mysqli_fetch_assoc($result))
        {
            foreach($row as $key => $val)
            {
                if(array_key_exists($key, $arr)){ 
                    $arr[$key] = $val;
                }
            }
            $ret_arr[] = $arr;
        }
        mysqli_free_result($result);
    }
    for($i = 0; $i < count($ret_arr);$i++)
    {
        foreach($ret_arr[$i] as $key => $val)
        {
            if($key == 'user_id'){
                if($result = mysqli_query($link, "SELECT * FROM user WHERE id=".$val)){
                    while($row = mysqli_fetch_assoc($result)){
                        $ret_arr[$i]['user_name'] = $row['name'];
                    }
                    mysqli_free_result($result);
                }
            }
        }
    }
    mysqli_close($link);
    
    return $ret_arr;
}
function show_recall($photo_id)
{
    $arr = [
        'name' =>"",
        'date' =>"",
        'text' => ""
    ];
    $ret_arr = [];
    $link = getLink();
    if($link == null){
        echo "Ошибка подключение к БД";
        exit;
    }
    mysqli_set_charset($link, "utf8");
    
    $query = "SELECT * FROM recall WHERE photo_id=".$photo_id;
    if($result = mysqli_query($link, $query)){
        while($row = mysqli_fetch_assoc($result)){
            foreach($row as $key => $val)
            {
                if(array_key_exists($key, $arr)){
                    $arr[$key] = $val;
                }
            }
            array_unshift($ret_arr, $arr);
        }
        mysqli_free_result($result);
    }else{
        return " ";
    }
    mysqli_close($link);
    if($ret_arr == null){
        return "Нет Отзывов";
    }else{
   return $ret_arr;
    }
}
function get_info($photo_id)
{
    $arr=[
        'inf_text' => " "
    ];
    $ret_arr = [];
    $link = getLink();
    if($link == null){
        echo "Ошибка подключение к БД";
        exit;
    }
    mysqli_set_charset($link, "utf8");
    
    $query = "SELECT info FROM photo WHERE id=".$photo_id;
    if($result = mysqli_query($link, $query)){
        while($row = mysqli_fetch_assoc($result)){
            $arr['inf_text'] = $row['info'];
        }
    }
    mysqli_free_result($result);
    mysqli_close($link);
    if($arr['inf_text'] == null){
        return "Нет описания";
    }else{
        //из за крявой настройки шаблонизатора
        array_unshift($ret_arr, $arr);
        return $ret_arr;
    }
}
//обновляем счетчик просмотров
function view($id, $view)
{
    $view+=1;
    $query = "UPDATE photo SET view='".$view."' WHERE id=".$id;
    $link = mysqli_connect(host, db_user, db_pw, db);
        if($result = mysqli_query($link, $query)){
            
        }
   
    mysqli_close($link);
}
?>