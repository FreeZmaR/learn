<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>((TITLE))</title>
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
      <h2>((TITLE))</h2>
       <div class="item_foto" style="display:inline-block">
        <img class="foto_item" src="((FOTO))" alt="((TITLE))" height="300px" width="500px">
        <br>
        <strong>((USER))</strong> ((DATE))
        view:((VIEW))
        </div>

        ((INFORM))
        <div class="clear"></div>
    </section>
    <div class="recall">
    <h4>Отзовы:</h4>
    ((SHOW_RECALL))
    <h3>Оставить отзыв</h3>
    <form action="uploadrecall.php?id=((ID))&foto=((FOTO))&title=((TITLE))&user=((USER))&date=((DATE))&view=((VIEW))&back=((BACK))" method="post">
    <p><textarea name="text"cols="40" rows="6" style="resize:none"></textarea></p>   
    <p><input type="submit" name="smb" value="Оставить отзыв"></p>
    </form>
</main>

</div>
<div class="buffer"></div>
<footer class="big">
      
  </footer>  
</body>
</html>