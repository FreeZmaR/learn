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
  
function show_news()
{
    $arr = [
        'Id' => "",
        'User_id' => "",
        'User_name' => "",
        'Name' => "",
        'Big_size' => "",
        'Small_size' => "",
        'Date' => "",
        'View' => ""
    ];
    $ret_arr = [];
    $link = mysqli_connect('localhost', 'test_user', 'pass', 'al_kosarkov');
     mysqli_set_charset($link, "utf8");
    if(!$link){
       exit; 
    }
    $user_id = "";
    $query = "SELECT Id, User_id, Name, Big_size, Small_size, View, Date FROM photo";
    if($result = mysqli_query($link, $query)){
        while($row = mysqli_fetch_assoc($result)){
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
            if($key == 'User_id'){
                if($result = mysqli_query($link, "SELECT * FROM user WHERE id=".$val)){
                    while($row = mysqli_fetch_assoc($result)){
                        $ret_arr[$i]['User_name'] = $row['Name'];
                    }
                    mysqli_free_result($result);
                }
            }
        }
    }
    mysqli_close($link);
    return $ret_arr;
}
//обновляем счетчик просмотров
function view($id, $view)
{
    $view+=1;
    $query = "UPDATE photo SET View='".$view."' WHERE Id=".$id;
    $link = mysqli_connect(host, db_user, db_pw, db);
        if($result = mysqli_query($link, $query)){
            
        }
   
    mysqli_close($link);
}
?>