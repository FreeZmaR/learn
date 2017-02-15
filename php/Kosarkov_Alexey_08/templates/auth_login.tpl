<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>((TITLE))</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrap" class="fullscreen-bg">
<header>
        <div class="logo">
            <a href="?page=index"><img src="img/logo/logo.png" alt="" >
                <h1>For Player <small>Все для спорта</small></h1></a>
        </div>
        <div class="login">
            ((LOGIN))
        </div>
        <nav>
            <ul>
               ((HEAD_MENU))
            </ul>
        </nav>
</header>
   <main>
       <section class="auth">
           <h2>Авторизация</h2>
           <div class="from">
               <dl>
                   <form action="?act=join" method="post">
                       <dt><label for="1">Логин:</label></dt>
                       <dd><input type="text" name="login" id="1" value="" required></dd>
                       <dt><label for="3">Пароль:</label></dt>
                       <dd><input type="password" name="pass" id="3"  value="" required></dd>
                       <dt><label for="4">Запомнить меня</label></dt>
                       <dd><input type="checkbox" name="rem1" value="" id="4"></dd>
                       <input type="submit" value="Авторизация" name="login" class="in">
                       <input type="button" value="Регистрация" name="reg" class="reg" onclick="location.href='index.php?page=singup'">
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