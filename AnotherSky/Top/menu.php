<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>
      <script>
      //logoの表示
      $(window).on('load',function(){
      $("#splash").delay(1500).fadeOut('slow');//ローディング画面を1.5秒（1500ms）待機してからフェードアウト
      $("#splash_logo").delay(1200).fadeOut('slow');//ロゴを1.2秒（1200ms）待機してからフェードアウト
      });
    </script>
      <div id="splash">
    <div id="splash_logo">
      <img src="img/logo.jpg" alt="" class="fadeUp">
    </div>
  </div>
  <main>
    <?php  require_once '../!Mng/header.php' ?>
    <div class="home-photo">
      <img src="img/another_sky_logo.jpg" alt="home">
    </div>

    <?php  require_once '../Commit/commit.php' ?>
  </main>
  <!--==============JQuery読み込み===============-->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/4-1-4/js/4-1-4.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</div>
  <h2>
    <div style="text-align: center;">
      <span style="font-size: 1.5em;">
        <font face="serif"><br /></font>
      </span>
    </div>
   
  </div>
    <hr>
    <div style="text-align: center;">
    <span style="font-family: serif; font-size: 36px;">Hometown</span>
<?php
require_once "../!Mng/DBManager.php";
$get = new DBManager();

$posts = $get->get_all_posts();
$displayCount = 0; // 表示済みのポスト数

foreach($posts as $post){
    if ($displayCount < 3) {
        echo '<div class="box">
        <h2>
          <a href="hometown_detail.php?post='.$post["post_id"].'">'.$post["place"].'</a>
          <span class="date">('.date('Y.m.d',strtotime($post["date"])).')</span>
        </h2>';
        if(isset($post["first_image"])){
          echo 
          '<p class="box_img">
            <img src="'.$post["first_image"].'" alt="Thumbnail" width="150" height="150">
          </p>';
        }
        echo 
        '<div class="box_sentence">
          <p>
            '.$post["text"].'…
            <a href="hometown_detail.php?post='.$post["post_id"].'">続きを読む</a>
          </p>
        </div>
      </div>';

      $displayCount++;
    }
}
?>
    <!--<span style="font-family: serif; font-size: 36px;">Hometown</span>
      <div class="box">
      <h2>
        <a href="#">大分　湯布院</a>
        <span class="date">(2023.09.29)</span>
      </h2>
      <p class="box_img">
        <img src="img/desktop.JPG" alt="Thumbnail" width="150" height="150">
      </p>

      <div class="box_sentence">
        <p>
          私のアナザースカイは大分の湯布院です。心が乱れている時によく行ってます<br>
          ここの金賞コロッケを食べてガラスの森に行くのがいつものルーティンです<br>
          今までもこれからも通いたい私のアナザースカイです。ぜひ詳細をご覧ください…
          <a href="#">続きを読む</a>
        </p>
      </div>
    </div>
    <div class="box">
      <h2>
        <a href="#">大分　湯布院</a>
        <span class="date">(2023.09.29)</span>
      </h2>
      <p class="box_img">
        <img src="img/desktop.JPG" alt="Thumbnail" width="150" height="150">
      </p>

      <div class="box_sentence">
        <p>
          私のアナザースカイは大分の湯布院です。心が乱れている時によく行ってます<br>
          ここの金賞コロッケを食べてガラスの森に行くのがいつものルーティンです<br>
          今までもこれからも通いたい私のアナザースカイです。ぜひ詳細をご覧ください…
          <a href="#">続きを読む</a>
        </p>
      </div>
    </div>
    <div class="box">
      <h2>
        <a href="#">大分　湯布院</a>
        <span class="date">(2023.09.29)</span>
      </h2>
      <p class="box_img">
        <img src="img/desktop.JPG" alt="Thumbnail" width="150" height="150">
      </p>

      <div class="box_sentence">
        <p>
          私のアナザースカイは大分の湯布院です。心が乱れている時によく行ってます<br>
          ここの金賞コロッケを食べてガラスの森に行くのがいつものルーティンです<br>
          今までもこれからも通いたい私のアナザースカイです。ぜひ詳細をご覧ください…
          <a href="..//AnotherSky/hometowndetail">続きを読む</a>
        </p>
      </div>
    </div>-->
    <a onclick="location.href='../AnotherSky/hometown.php'" value=""><span style="font-family: serif; font-size: medium;">more view</span></a>
  </h2>
</div>

      <?php  require_once '../!Mng/footer.php' ?>
</body>
</html>