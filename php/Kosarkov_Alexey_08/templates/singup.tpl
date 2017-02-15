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
           <h2>Регистрация</h2>
           <div class="auth">
               <p>
                   Если у вас уже есть учетная запись
                   то пройдите<br>
                   <a class="auth_login" href="login.html">Авторизация</a>
                   <br>
                   <a href="">Забыли пароль?</a>
               </p>
           </div>
           <div class="from">
               <dl>
                   <form action="?act=singup" method="post">
                       <dt><label for="1">Логин:</label></dt>
                       <dd><input type="text" name="login" id="1" value="" required></dd>
                       <dt><label for="2">Имя:</label></dt>
                       <dd><input type="text" name="name" id="2" value="" required></dd>
                       <dt><label for="5">Email:</label></dt>
                       <dd><input type="email" name="email" id="5" value="" required></dd>
                       <dt><label for="3">Пароль:</label></dt>
                       <dd><input type="password" name="pass" id="3"  value="" required></dd>
                       <dt><label for="4">Повторить:</label></dt>
                       <dd><input type="password" name="ret_pass" value="" id="4" required></dd>
                       <input type="submit" value="Регистрация" name="reg" class="reg">
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
        ((FOOT_MENU))
    </footer>
</body>
</html>