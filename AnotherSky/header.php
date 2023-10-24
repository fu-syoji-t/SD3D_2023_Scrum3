<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>5-1-15 クリックしたら背景が全面に広がる</title>
<meta name="description"  content="書籍「動くWebデザインアイディア帳」のサンプルサイトです">

<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--==============レイアウトを制御する独自のCSSを読み込み===============-->
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-1-15/css/5-1-15.css">
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

          /*========= ナビゲーションのためのCSS ===============*/

          #g-nav{
            /*position:fixed;にし、z-indexの数値を小さくして最背面へ*/
            position:fixed;
        z-index: -1;
        opacity: 0;/*はじめは透過0*/
            /*ナビの位置と形状*/
        top:0;
        width:100%;
            height: 100vh;/*ナビの高さ*/
        background:#999;
            /*動き*/
        transition: all 0.3s;
        }

        /*アクティブクラスがついたら透過なしにして最前面へ*/
        #g-nav.panelactive{
        opacity: 1;
        z-index:999;
        }

        /*ナビゲーションの縦スクロール*/
        #g-nav.panelactive #g-nav-list{
            /*ナビの数が増えた場合縦スクロール*/
            position: fixed;
            z-index: 999; 
            width: 100%;
            height: 100vh;/*表示する高さ*/
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }

        /*ナビゲーション*/
        #g-nav ul {
            display: none;
            /*ナビゲーション天地中央揃え*/
            position: absolute;
            z-index: 999;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
        }

        #g-nav.panelactive ul {
            display: block;
        }

        /*リストのレイアウト設定*/

        #g-nav li{
        list-style: none;
            text-align: center; 
        }

        #g-nav li a{
        color: #333;
        text-decoration: none;
        padding:10px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-weight: bold;
        }

        /*========= ボタンのためのCSS ===============*/
        .openbtn1{
        position:fixed;
            z-index: 9999;/*ボタンを最前面に*/
        top:10px;
        right: 10px;
        cursor: pointer;
            width: 50px;
            height:50px;
        }
        
        /*×に変化*/  
        .openbtn1 span{
            display: inline-block;
            transition: all .4s;
            position: absolute;
            left: 14px;
            height: 3px;
            border-radius: 2px;
        background-color: #666;
            width: 45%;
        }

        .openbtn1 span:nth-of-type(1) {
        top:15px; 
        }

        .openbtn1 span:nth-of-type(2) {
        top:23px;
        }

        .openbtn1 span:nth-of-type(3) {
        top:31px;
        }

        .openbtn1.active span:nth-of-type(1) {
            top: 18px;
            left: 18px;
            transform: translateY(6px) rotate(-45deg);
            width: 30%;
        }

        .openbtn1.active span:nth-of-type(2) {
        opacity: 0;
        }

        .openbtn1.active span:nth-of-type(3){
            top: 30px;
            left: 18px;
            transform: translateY(-6px) rotate(45deg);
            width: 30%;
        }



        /*========= レイアウトのためのCSS ===============*/

        h1{
        font-size:1.2rem;
        }

        h2{
        font-size:1.2rem;
        text-align: center;
        margin: 0 0 30px 0;
        }

        p{
        margin-top:20px;  
        }

        small{
        color:#fff;
        display: block;
        text-align: center;
        }

        #header{
        width:100%;
        background:#333;
        color:#fff;
        text-align: center;
        padding: 10px;
        }

        section{
        padding:100px 30px;
        }

        section:nth-child(2n){
        background:#f3f3f3; 
        }

        #footer{
        background:#333;
        padding:20px;
        }
        #logo {
    max-width: 82px; /* 最大幅を指定 */
    max-height: 46px; /* 最大高さを指定 */
}
    </style>
<header id="header">
    <img src="img/anothersky.gif" alt="logo" id="logo">
</header>


<div class="openbtn1"><span></span><span></span><span></span></div>
<nav id="g-nav">
  <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
    <ul>
      <li><a href="../AnotherSky/menu.php">Top</a></li>  
      <li><a href="../AnotherSky/hometown.php">Hometown</a></li>  
      <li><a href="../AnotherSky/another.php">Commit</a></li>  
      <li><a href="../AnotherSky/category.php">Category</a></li>
      <li><a href ="account.php">Account</a></li> 
      <li><a href ="account.php">login</a></li> 
    </ul>
  </div>
</nav>
</header>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-1-15/js/5-1-15.js"></script>
<script>
        $(".openbtn1").click(function () {//ボタンがクリックされたら
        $(this).toggleClass('active');//ボタン自身に activeクラスを付与し
            $("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
        });

        $("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
            $(".openbtn1").removeClass('active');//ボタンの activeクラスを除去し
            $("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスも除去
        });
    </script>
</body>
</html>

