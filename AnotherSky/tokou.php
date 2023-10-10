<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/homea.css"> 
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
</head>
<body>
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');

          body{
              text-align: center;
              background-color:#DDDDDD;
              font-family: 'Sacramento', cursive;
              font-family: "Kokoro";
          }
          .input{
            margin-top: 10%;
            border-radius: 20% 20% 20% 20%;
            background-color: #999999;
          }
          .input>input{
            btn-outline-dark
          }
      </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<a onclick="location.href='../AnotherSky/login.php'" value=""><h2 style="text-align: right;">log in&nbsp;&nbsp;</h2></a>
    <?php  require_once 'header.php' ?>
</div>
<div><hr /></div>

<form action="post(b).php" method="post" enctype="multipart/form-data">
    title <br> 
    <input type="text" name="title" maxlength="30"><br>
    region <br> 
    <select name="region">
        <option value=1>北海道</option>
        <option value=2>東北</option>
        <option value=3>関東</option>
        <option value=4>中部</option>
        <option value=5>近畿</option>
        <option value=6>中国</option>
        <option value=7>四国</option>
        <option value=8>九州</option>
        <option value=9>海外</option>
    </select><br>
    place <br> 
    <input type="text" name="place"><br>
    youtube <br> 
    <textarea name="link"></textarea><br>
    freespace <br>
    <textarea name="text"></textarea><br><br>
    <div class="input">
    画像を選択 <br>
    <input type="file" name="post_image1" accept="image/*"><br>
    具体的なスポット　　　　　　　  <br>
    <textarea name="sentence1_1"></textarea><br>
    そこに行くようになったきっかけ  <br>
    <textarea name="sentence1_2"></textarea><br>
    どんな思い出があるのか　　　　  <br>
    <textarea name="sentence1_3"></textarea><br><br>
    </div>
    <div class="input">
    画像を選択  <br>
    <input type="file" name="post_image2" accept="image/*"><br>
    具体的なスポット　　　　　　　  <br>
    <textarea name="sentence2_1"></textarea><br>
    そこに行くようになったきっかけ  <br>
    <textarea name="sentence2_2"></textarea><br>
    どんな思い出があるのか　　　　  <br>
    <textarea name="sentence2_3"></textarea><br><br>
    </div>
    <div class="input">
    画像を選択  <br>
    <input type="file" name="post_image3" accept="image/*"><br>
    具体的なスポット　　　　　　　  <br>
    <textarea name="sentence3_1"></textarea><br>
    そこに行くようになったきっかけ  <br>
    <textarea name="sentence3_2"></textarea><br>
    どんな思い出があるのか　　　　  <br>
    <textarea name="sentence3_3"></textarea><br><br>
    </div>
    <div class="input">
    画像を選択 <br>
    <input type="file" name="post_image4" accept="image/*"><br>
    具体的なスポット　　　　　　　  <br>
    <textarea name="sentence4_1"></textarea><br>
    そこに行くようになったきっかけ  <br>
    <textarea name="sentence4_2"></textarea><br>
    どんな思い出があるのか　　　　  <br>
    <textarea name="sentence4_3"></textarea><br><br>
    </div>
    <div class="input">
    <input type="button" onclick="history.back()" value="戻る"><br><br>
    <input type="submit" value="投稿">
    </div>
</form>
  <h2>
    <div style="text-align: center;">
      <?php  require_once 'footer.php' ?>
    </div>
  </h2>
</div>
</body>
</html>