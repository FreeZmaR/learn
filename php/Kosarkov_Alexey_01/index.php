<?php
$title = "For Player";
$mess_h1 = "For Player";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php 
    echo "<title>$title</title>" 
    ?>
    <link rel="stylesheet" href="style/style.css" type="text/css">
</head>
<body>
    <div class="header">
       <?php 
        echo "<h1>$mess_h1</h1>"
        ?>
        <ul id="head_menu">
            <li><a href="#">Главная</a></li>   
            <li><a href="cotalog.html">Каталог</a></li>   
            <li><a href="contact.html">Контакты</a></li>   
        </ul>
    </div>
    
    <div class="content">
        <h2>Для Играков</h2>
        <p>
            На нашем сайте вы найдете все что нужно для <strong>профессиональных</strong> играков , по всем видам спорта.
        </p>
        <a href="cotalog.html"><img src="img/all-sports-banner.png" alt="For Player" title="Перейти к Каталогу"></a>
    </div>
    <div id="footer">
       &laquo;Все права защищены&raquo; &copy; <a href="index.html">ForPlayer</a> 2016 
    </div>
</body>
</html>