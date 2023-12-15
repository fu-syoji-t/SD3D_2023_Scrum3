<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>アナザースカイについて</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--==============レイアウトを制御する独自のCSSを読み込み===============-->
<link rel="stylesheet" type="text/css" href="http://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/move02/6-2/css/reset.css">
<link rel="stylesheet" type="text/css" href="http://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/move02/6-2/css/6-2.css">
<style>
    /*========= レイアウトのためのCSS ===============*/

    body{
    background:#f4f4f4;
    }

    img{
    max-width:100%;
    height:auto;
    }

    h1{
    text-align: center;
    font-size:1.5rem;
    padding: 30px 0;
    }

    h2{
    font-size:1.3rem;
    margin:0 0 20px 0;
    }

    /*写真と文章のセット　装飾のためのCSS*/

    .area{
    position:relative;
    margin:0 auto 20% auto;
    padding: 0 30px;
    max-width:1000px;
    width:100%;
    }

    .area figure{
    position:relative;
    left:0;
    top:0;
    width:40%;
    line-height: 0;
    }

    .area:nth-child(2n) figure{
    left:50%;
    }

    .area .box{
    position:absolute;
    top:40%;
    left:30%;
    background:#fff;
    padding:30px;
    box-shadow: 0 0 40px rgba(0,0,0,0.1);
    }

    .area:nth-child(2n) .box{
    left:inherit;
    right:30%;
    }

    /*＝＝＝＝＝＝＝＝＝＝＝タブレット以下の見え方＝＝＝＝＝＝＝＝＝＝＝＝＝*/

    @media screen and (max-width:768px){
    .area figure{
    width:50%;
    }
    

    }

    @media screen and (max-width:600px){
    h2{
    text-align: center;
    }
    
    .area:nth-child(2n) figure {
        left: 0;
    }
    
    .area figure{
    width:100%;
    }
    .area .box,
    .area:nth-child(2n) .box{
        position: relative;
        top: 0;
        left: 0;
    right: inherit;
    padding:20px;
    }

    }
    .title{
        text-align: center;
        font-size: 36px;
        margin: 40px;
    }
</style>
<script>
    //768px以上のみライブラリを読み込む場合はif前と一番最後のコメントを外してください
    //if(matchMedia('(min-width: 768px)').matches){
    luxy.init();
    //} 
</script>
</head>

<body>
<div id="wrpeer">
<?php  require_once '../!Mng/header.php' ?>
<div class="title">
    <h1>COMMIT</h1>
</div>

<div id="luxy">

  <section class="area">
  <figure class="luxy-el" data-speed-y="8" data-offset="50"><img src="../img/logo.jpg" alt=""></figure>
  <div class="box luxy-el" data-speed-y="-5">
  <h2>AnotherSky使い方ガイド</h2>
    <p>Another Skyの世界へようこそ！有名人のみならず生きてる人には皆忘れられない場所があると思います。このサイトではそんな第二の故郷を共有し共有され、ひとりひとりの人生を尊重し合い価値観を広げ合いましょう。日本のみならず海外のカテゴリーもあるのでぜひご覧ください</p>
  </div>
  </section>
  <section class="area">
  <figure class="luxy-el" data-horizontal="1" data-speed-x="-2"><img src="../img/another_1.jpeg" alt=""></figure>
  <div class="box luxy-el" data-speed-y="-5">
  <h2>カテゴリー</h2>
    <p>気になるアナザースカイの場所をカテゴリー別に表示できます。みんなの第二の故郷に訪れる際のヒントになるかもしれません。</p>
  </div>
  </section>
  
  <section class="area">
  <figure class="luxy-el" data-horizontal="1" data-speed-x="2"><img src="../img/another_2.jpg" alt=""></figure>
  <div class="box luxy-el" data-speed-y="-5">
  <h2>youtube共有</h2>
    <p>このサイトではyoutubeに上げたアナザースカイの投稿を共有することができます。「投稿する」からyoutube埋め込みという欄があるのでそこにyoutubeのリンクを添付してください※投稿するにはアカウント登録が必要です</p>
  </div>
  </section>
  
  <section class="area">
  <figure class="luxy-el" data-speed-y="5" data-offset="-250"><img src="../img/another_3.jpg" alt=""></figure>
  <div class="box luxy-el" data-speed-y="-4" data-offset="50">
  <h2>お気に入り</h2>
    <p>誰かのアナザースカイに訪れたい方もいるでしょう。気に入った投稿を保存していつでも見返せるようにしましょう。※投稿保存をするにはアカウント登録が必要です</p>
  </div>
  </section>

</div>
</div>

    
<script src="http://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/move02/6-2/js/luxy.js"></script>
<script src="http://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/move02/6-2/js/6-2.js"></script>
</body>
</html>