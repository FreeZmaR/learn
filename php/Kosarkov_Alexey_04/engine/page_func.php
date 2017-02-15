<?php 

function render_page($file, $site_content = [])
{
    //проверка на наличие шаблона и его содержимого
    if( !is_file($file) || (filesize($file) == 0) ){
        return file_get_contents(TMS_DIR."404.html");
        
    }
    
    $template = file_get_contents($file);
    //проверка на наличие контента для шаблона
    if(count($site_content) != 0){
       foreach($site_content as $key => $val)
       {
           if(is_array($val) && ($val != null )){
               foreach($val as $key => $temp)
               {
                   $key = "((".strtoupper($key)."))";
                   $template = str_replace($key, $temp, $template);
               }
           }else if($val != null){
               $key = "((".strtoupper($key)."))";
               $template = str_replace($key, $val, $template);
           }
         
       }
    }
    return $template;
}
  
function show_foto()
{
  $dir = "img/";
  $dir_small = $dir."small/";
  $stream = opendir($dir_small);
    $ret_foto = "";
  while($item = readdir($stream))
  {
     if ($item != "." && $item != "..") {
           $ret_foto.='<a href="'.$dir.$item.'" target="_blank"><img src="'.$dir_small.$item.'"  title="'.$item.'"></a>';
        }
  }
  closedir($stream);
    return $ret_foto; 
}
?>