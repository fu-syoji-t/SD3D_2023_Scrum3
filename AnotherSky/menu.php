<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="../css/homea.css">
</head>
<body>
  <style>  
      body {
          background-color: #DDDDDD;
        }


        h1 {
          background-color: gray;
          font-size: 23px;
          font-family: "Arial Black";
          letter-spacing: 2px;
          text-align: center;
          text-justify: auto;
        }
        /*.h6{
          background-color: #DDDDDD;
          height: 200px;
          margin: 30px auto;
          overflow: hidden;
          padding: 15px;
          width: 500px;
        }*/

        .box {
          background-color: #FFF;
          box-shadow: 0 5px 5px #999;
          height: 200px;
          margin: 30px auto;
          overflow: hidden;
          padding: 15px;
          width: 380px;
        }

        .box a:link,
        .box a:visited {
          color: #00C;
        }

        .box a:hover {
          color: #33F;
        }

        .box > h2 {
          font-size: 16px;
          margin: 0;
        }

        .box > h2 > .date {
          color: #666;
          font-size: 13px;
          font-weight: normal;
        }

        .box > .box_img {
          float: left;
          margin-right: 10px;
          width: 150px;
        }

        .box > .box_sentence > p {
          color: #444;
          font-size: 14px;
        }

        .more{
          text-align: center;
        }
      .col{
        background-color: #DDDDDD;
          margin: 30px auto;
          overflow: hidden;
          padding: 15px;
          width: 100vw;
      }
      .h8{
          background-color: #DDDDDD;
          margin: 30px auto;
          overflow: hidden;
          padding: 0px;
          width: 100vw;
          text-align: center;
        }
      iframe{
        margin-bottom: auto;
        margin-left: 50px;
        margin-right: auto;
        margin-top: auto;
      }
      /*追加文 */
      .home-photo {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* 画面いっぱいに表示 */
        }

        .home-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        /* Loading背景画面設定　*/
        #splash {
            /*fixedで全面に固定*/
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 999;
        background:black;
        text-align:center;
        color:#fff;
        }

        /* Loading画像中央配置　*/
        #splash_logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        }

        /* Loading アイコンの大きさ設定　*/
        #splash_logo img {
        width:260px;
        }

        /* fadeUpをするアイコンの動き */

        .fadeUp{
        animation-name: fadeUpAnime;
        animation-duration:0.5s;
        animation-fill-mode:forwards;
        opacity: 0;
        }

        @keyframes fadeUpAnime{
        from {
            opacity: 0;
        transform: translateY(100px);
        }

        to {
            opacity: 1;
        transform: translateY(0);
        }
        }



        /*========= レイアウトのためのCSS ===============*/

        #container{
            width:100%;
            height: 100vh;
            background: #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        a{
            color: #333;
        }

        a:hover{
            text-decoration: none;   
        }
  </style>
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
    <?php  require_once 'header.php' ?>
    <div class="home-photo">
      <img src="img/another_sky_logo.jpg" alt="home">
    </div>

    <?php  require_once 'commit.php' ?>
  </main>
  <!--==============JQuery読み込み===============-->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/4-1-4/js/4-1-4.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <?php  require_once 'header.php' ?>
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
require_once "DBManager.php";
$get = new DBManager();

$posts = $get->get_all_post();
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

      <?php  require_once 'footer.php' ?>
</body>
</html>