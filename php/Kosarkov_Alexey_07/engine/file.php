<?php 
//проверка на наличие такого файла в папке возвращает
//true - при наличиие и false - при его отсутствие 
function check_file_name($file_name, $file_dir) 
{
    if(file_exists($file_dir.$file_name)){
        return false;
    }else{
        return true;
    }
}
//Проверка на тип файла 
function check_file_type($file_type, $accec_type = [])
{
    for($i = 0 ; $i < count($accec_type); $i++)
    {
        if($file_type == $accec_type[$i]){
            return true;
        }
    }
    return false;
}
function translate($str)
{
    //массив с русскими буквами и их  перевод на англ
    $letter = [
    'а' => "a",
    'б' => "b",
    'в' => "v",
    'г' => "g",
    'д' => "d",
    'е' => "e",
    'ё' => "yo",
    'ж' => "zh",
    'з' => "z",
    'и' => "i",
    'й' => "y",
    'к' => "k",
    'л' => "l",
    'м' => "m",
    'н' => "n",
    'о' => "o",
    'п' => "p",
    'р' => "r",
    'с' => "s",
    'т' => "t",
    'у' => "u",
    'ф' => "f",
    'х' => "h",
    'ц' => "c",
    'ч' => "ch",
    'ш' => "sh",
    'щ' => "sch",
    'ъ' => "",
    'ы' => "y",
    'ь' => "",
    'э' => "e",
    'ю' => "yu",
    'я' => "ya",
    '.' => ".",
    ' ' => "_" ];
    //перевод строки в массив
    $str_arr = mb_str_split(mb_strtolower($str));
    $str_ret = "";
    
    for($i = 0 ; $i < count($str_arr);$i++)
    {
        foreach($letter as $key => $val){
            if($str_arr[$i] == $key){
                $str_arr[$i]=$val;
            }
        }
        $str_ret.=$str_arr[$i];
    }
    
    
    
    return $str_ret;
}
function mb_str_split($str)//разбор строки на символы , сторока в массив
    {
        preg_match_all('#.{1}#uis', $str, $out);
        return $out[0];
    }
//добавление в конец название файла число , если в конце есть числло то увеличит его на еденицу
function rename_file($file_name)
{
    $arr_name = mb_str_split($file_name);
    $new_name = "";
    $base_name = [];
    $type_name = "";
    $iter = 0;
    for($i = 0 ; $i < count($arr_name); $i++)
    {
        if($arr_name[$i] == '.'){
            $iter++;
        }
        if($iter == 0){
           array_push($base_name, $arr_name[$i]);
        }else{
            $type_name.= $arr_name[$i];
        }
    }
    
    if(is_numeric($base_name[count($base_name)-1])){
        $base_name[count($base_name)-1]+= 1;
    }else{
        array_push($base_name, '1');
    }
    
    for($i = 0 ; $i < count($base_name);$i++)
    {
        $new_name.= $base_name[$i];
    }
    
    return $new_name.$type_name;
}

function resize($path, $save, $width, $height)
{
	$info = getimagesize($path); // получаем размеры картинки и ее тип
	$size = array($info[0], $info[1]); // закидываем размеры в массив

    // в зависимости от расширения картинки вызываем соответствующую функцию
	if ($info['mime'] == 'image/png') {
		$src = imagecreatefrompng($path); // создаём новое изображение из файла
	} else if ($info['mime'] == 'image/jpeg') {
		$src = imagecreatefromjpeg($path);
	} else if ($info['mime'] == 'image/gif') {
 		$src = imagecreatefromgif($path);
	} else {
		return false;
	}

    // возвращаем идентификатор изображения, представляющий черное изображение заданного размера
	$thumb = imagecreatetruecolor($width, $height); 
	$src_aspect = $size[0] / $size[1]; // отношение ширины к высоте исходника
	$thumb_aspect = $width / $height; // отношение ширины к высоте аватарки

	if ($src_aspect < $thumb_aspect) {
        // узкий вариант (фиксированная ширина) 		
        $scale = $width / $size[0]; 		
        $new_size = array($width, $width / $src_aspect);
        $src_pos = array(0, ($size[1] * $scale - $height) / $scale / 2); 
        // ищем расстояние по высоте от края картинки до начала картины после обрезки 	
    } elseif ($src_aspect > $thumb_aspect) {
        // широкий вариант (фиксированная высота)
		$scale = $height / $size[1];
		$new_size = array($height * $src_aspect, $height);
		$src_pos = array(($size[0] * $scale - $width) / $scale / 2, 0); 
        // ищем расстояние по ширине от края картинки до начала картины после обрезки
	} else {
		//другое
		$new_size = array($width, $height);
		$src_pos = array(0,0);
	}

	$new_size[0] = max($new_size[0], 1);
	$new_size[1] = max($new_size[1], 1);

    // копирование и изменение размера изображения с ресемплированием
	imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);
	
	if($save === false) {
		return imagepng($thumb); // возвращаем JPEG/PNG/GIF изображение
	} else {
		return imagepng($thumb, $save); // сохраняем JPEG/PNG/GIF изображение
	}
  
}
?>