<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>((TITLE))</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="wrap">
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
   <main>
   <h2>Фотографии пользовотелей</h2>
    ((SHOW_FOTO))
    
    <h2>Загрузить Фотографию</h2>
    <div class="down_foto">
        <form action="uploadfoto.php" enctype="multipart/form-data" method="post">

            <p><label for="name">Название:</label><br><input type="text" id="name" name="photo_name" placeholder="Название фото"></p>
            <p><label for="text">Описание:</label><textarea name="text" id="text" cols="30" rows="5" ></textarea></p>
            <p><input name="pictur" type="file" accept="image/*" required/></p>
            <p><input type="submit" value="Загрузить" /></p>
        </form>
    </div>
    
    </main>
    <div class="buufer"></div>
    </div>
    <footer>
        
    </footer>
</body>
</html>