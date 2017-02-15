<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>((TITLE))</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        section{
            margin: 0 auto;
            padding-left: 35px;
            margin-top: 25px;
        }
    </style>
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
      <h2>Карзина</h2>
    <section>
        <h3><strong>Общая цена : </strong> ((PRICE_COUNT)) руб</h3>
        <ol class="items">
         ((ITEMS))
        </ol>
    </section>
  </main>
  
  <div class="buffer"></div>
</div>
<footer>
    ((FOOT_MENU))
</footer>
</body>
</html>