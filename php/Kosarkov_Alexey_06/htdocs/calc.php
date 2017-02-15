<?php
require_once("../engine/calc_func.php");

$first_num = [];
$second_num = [];
$mode = 0;
$result = 0 ;
    if(isset($_POST['bt'])){
        if($mode == 0){
            $first_num[] = $_POST['bt'];
            if($result != 0){
                $result .= $_POST['bt'];
            }else{
                $result = $_POST['bt'];
            }
        }else{
            
            $second_num[] = $_POST['bt'];
        }
    }

if(isset($_POST['qu']) && ((count($first_num) != 0) && (count($second_num) != 0))){
    if(chek_num($first_num, $second_num)){
       $result = chois($mode, $first_num, $second_num); 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <style>
        input{
            width: 40px;
            margin-right: 10px;
        }
        .big{
            width: 240px;
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php">Назад на главную</a>
        <p><textarea name="store" id="" cols="30" rows="10">
            <?php 
               
            ?>
        </textarea></p>
    </header>
    <main>
        <form action="?" method="post">
            <p><input class="big" type="text" name="show" value="<?php echo $result; ?>"></p>
            <p><input name="bt" type="button" value="1"><input name="bt" type="button" value="2"><input type="button" name="bt" value="3"><input type="button" name="sum" value="+"><input type="button" name="mult" value="*"></p>
            <p><input type="button" name="bt" value="4"><input type="button" name="bt" value="5"><input type="button" name="bt" value="6"><input type="button" name="sub" value="-"><input type="button" name="div" value="/"></p>
            <p><input type="button"  name="bt" value="7"><input type="button" name="bt" value="8"><input type="button" name="bt" value="9"><input type="submit" name="qu" value="="><input name="res" type="reset" value="RE"></p>
            <p><input class="big" name="bt" type="button" value="0"></p>
        </form>
    </main>
    <footer>
        
    </footer>
</body>
</html>