<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="書籍「動くWebデザインアイディア帳」のサンプルサイトです">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!--==============レイアウトを制御する独自のCSSを読み込み===============-->
    <link href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css" rel="stylesheet">
    <link href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/4-1-4/css/4-1-4.css" rel="stylesheet">
    <title>HTML+CSS</title>
    <style>
        body {
          background-color: #DDDDDD;
        }

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
  </head>
<body>
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
    <?php  require_once 'hometown.php' ?>
    <?php  require_once 'footer.php' ?>
  </main>
  <!--==============JQuery読み込み===============-->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/4-1-4/js/4-1-4.js"></script>
</body>
</html>

