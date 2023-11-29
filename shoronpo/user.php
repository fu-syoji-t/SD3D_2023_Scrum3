<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>header</title>
    <style>
        body {
          background-color: #DDDDDD;
        }
        .users {
            margin: 0 auto;
        }
        .users-sgin {
            font-size: 24px;
        }
    </style>
  </head>
  <body>
    <?php  require_once 'header.php' ?>
    <div class="users">
        <div class="users-sgin"><a href="account.php">sgin-up</a></div>
        <div class="users-sgin"><a href="login.php">sgin-in</a></div>
    </div>
    <?php  require_once 'footer.php' ?>
  </body>
</html>

