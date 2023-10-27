<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>header</title>
    <style>
        .header-logo {
            padding: 16px 24px;
            font-size: 24PX;
            text-align: center;
            }

        .header-list {
            width: 1200px;
            display: flex;
            justify-content: center;
            gap: 100px;
            font-size: 16px;
            font-weight: bold;
            margin: 24px auto;
            border-bottom: 1px solid;
            }

        .header-item {
            list-style: none;
          }
        
        .header-item > a {
          text-decoration: none;
          color:black;
        }
    </style>
  </head>
  <body>
  <header class="header">
    <h1 class="header-logo">ANOTHER SKY</h1>

    <nav class="header-nav">
        <ul class="header-list">
            <li class="header-item"><a href="home.php">home</a></li>
            <li class="header-item"><a href="hometownhome.php">hometown</a></li>
            <li class="header-item"><a href="commithome.php">commit</a></li>
            <li class="header-item"><a href="category.php">category</a></li>
            <li class="header-item"><a href="account.php">account</a></li>
        </ul>
    </nav>
</header>
  </body>
</html>

