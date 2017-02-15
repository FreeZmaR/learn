<?php 
 include_once "home.php";
     
$work1 = 'Ответ';
$work2 = "Ответ";
$work3 = "Ответ";
$data = $_POST;
$time = time_show();
if( isset($data['wk1'])){
    $error = array();
    if($data['a1']== '' ){
        $error[]='Значения не введены!';
    }
    if($data['b1']== '' ){
        $error[]='Значения не введены!';
    }
    if(!is_int($data['a1']) && !is_int($data['b1'])){
        $error[]='Число не целое!';
    }
    if(!empty($error)){
        $work1=home_work_01($data['a1'], $data['b1']);
    }else{
        echo'<div style="color:red;">'.array_shift($error).'</div>'; 
    }
}

if(isset($data['wk2'])){
    $work2=print_mass(home_work_02($_POST['a2']));
}else{
    $work2 = "Ответ";
}
if(isset($data['wk3'])){
    $work3 = power($data['a3'], $data['b3']);
}else{
    $work3 = "Ответ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Work</title>
</head>
<body>
   <hr>
    <h3>Задание 1</h3>
    <form action="" method="post">
        <input type="text" name="a1" placeholder="Введите число 1">
        <input type="text" name="b1" placeholder="Введите число 2">
        <input type="submit" value="ok" name="wk1">
        <p><?php echo "<label>$work1</label>" ?></p>
    </form>
    <h3>Задание 2</h3>
    <form action="" method="post">
        <input type="text" name="a2" placeholder="Введите число">
        <input type="submit" value="ok" name="wk2">
        
       <?php echo "<p>".$work2."</p>"; ?>
   
    </form>
    
    <h3>Задание 3</h3>
    <form action="" method="post">
        <input type="text" name="a3" placeholder="Введите число">
        <input type="text" name="b3" placeholder="Введите степень">
        <input type="submit" value="ok" name="wk3">
        <p><?php echo "<label>$work3</label>" ?></p>
    </form>
        <hr>
        <p><strong>Время : </strong>
        <?php echo '<strong>'.$time.'</strong>' ?></p>
        <hr>

</body>
</html>