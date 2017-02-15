<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>((NAME))</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrap">
    <header>
        <div class="logo">
            <a href="?page=index"><img src="img/logo/logo.png" alt="For Player" >
                <h1>For Player <small>Все для спорта</small></h1></a>
        </div>
        ((LOGIN))
        <nav>
            <ul>
               ((HEAD_MENU))
            </ul>
        </nav>
    </header>
<main class="item">
    <a href="?page=((BACK))">Назад</a>

    <section class="view_item">
      <h2>((NAME))</h2>
       <div class="item_foto">
        <img class="foto_item" src="img/item/((IMG))" alt="((NAME))" width="300px" height="300px">
        <br>
          Купило: ((VIEW))
        </div>
        <div class="info">
            ((INFORM))
            <span>Цена : <strong>((PRICE))</strong>руб</span>
            <a href="index.php?id=((ID))&act=itemadd">
                <img class="buy" src="img/logo/buy.jpg" alt="В карзину" title="В карзину">
            </a>
        </div>

    </section>
    <div class="buffer"></div>
</div>
<footer>
    ((FOOT_MENU))
</footer>
</body>
</html>