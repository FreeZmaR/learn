<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>((NAME))</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrap" class="view">
  <header>
   <div class="logo">
    <a href="?page=index"><img src="img/logo/logo.png" alt="" >
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
       <div class="item_foto" style="display:inline-block">
        <img class="foto_item" src="img/item/((IMG))" alt="((NAME))" width="300px" height="300px">
        <br>
          view:((VIEW))
        </div>

        ((INFORM))
        <div class="clear"></div>
        <h3 style="display:inline-block">Цена: ((PRICE)) руб</h3>
        <a href="../engine/buy_item.php?id=((ID))&act=itemadd"><img src="img/logo/buy.jpg" alt="" height="70px" width="70px"></a>
    </section>
</main>

</div>
<div class="buffer"></div>
<footer class="big">
      
  </footer> 
</body>
</html>