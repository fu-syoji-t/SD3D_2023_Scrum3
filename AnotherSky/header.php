<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>header</title>
  </head>
  <body>
    <style>
      .header{
        background-color: #DDDDDD;
          margin: 30px auto;
          overflow: hidden;
          padding: 15px;
          width: 100vw;
      }
      .busu{
        text-align: left;
        position: fixed;
        right: auto;
        margin-left: auto;
        bottom: 0%;
        height: 50px;
        text-decoration: none;
        font-weight: bold;
        transform: rotate(90deg);
        font-size: 100%;
        line-height: 1.5rem;
        color: #737373;
        padding: 0 0 0 1%;
        border-top: solid 1px;
      }
    </style>
  <header class="header">
  <input class="busu" type="button" onclick="history.back()" value="⬅︎"><br><br>

    <nav class="header-nav">
      <div style="text-align: center;">
      <div class="Header">
        <a onclick="location.href='../AnotherSky/menu.php'" value=""><font face="serif">home&nbsp;&nbsp;&nbsp;</font></a>
        <a onclick="location.href='../AnotherSky/hometown.php'" value=""><font face="serif">&nbsp;&nbsp;&nbsp;hometown&nbsp;&nbsp;&nbsp;</font></a>
        <a onclick="location.href='../AnotherSky/another.php'" value=""><font face="serif">&nbsp;&nbsp;&nbsp;anoher&nbsp;&nbsp;&nbsp;</font></a>
        <a onclick="location.href='../AnotherSky/category.php'" value=""><font face="serif">&nbsp;&nbsp;&nbsp;category&nbsp;&nbsp;&nbsp;</font></a>
        <hr>
      </div>
    </nav>
  </header>
</body>
</html>

