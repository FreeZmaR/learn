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
       <section class="singup">
          <h2>((TITLE))</h2>
          <div class="from">
          <dl>
           <form action="auth.php?act=join" method="post">
               <dt><label for="1">Логин:</label></dt>
               <dd><input type="text" name="login" id="1" value="" required></dd>
               <dt><label for="3">Пароль:</label></dt>
               <dd><input type="password" name="pass" id="3"  value="" required></dd>
               <dt><label for="rem">Запомнить Меня</label></dt>
               <dd><input class="chek" type="checkbox" name="rem"></dd>
               <input type="submit" value="((TITLE))" name="join" class="reg">
           </form>
           </dl>
           </div>
       </section>
       <ul>
           ((ERORR))
       </ul>
   </main>
    </div>
    <footer>
        
    </footer>
</body>
</html>