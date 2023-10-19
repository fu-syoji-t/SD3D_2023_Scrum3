<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<style>  
  body {
    background-color: #DDDDDD;
    font-family: 'Sacramento', cursive;
    font-family: "Kokoro";
  }
  h1 {
    background-color: gray;
    font-size: 23px;
    font-family: "Arial Black";
    letter-spacing: 2px;
    text-align: center;
  }
  .input {
            text-align: center;
            margin-top: 10%;
            margin-left: 10%;
            margin-right: 10%;
            border-radius: 20% 20% 20% 20%;
            background-color: #999999;
            padding: 0.5em;
            border-radius: 1.5em;
        }
        .maru {
            border-radius: 1.5em;
            text-align: center;
        }
        .mara {
          display: block;
        }
  </style>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<a onclick="location.href='../AnotherSky/login.php'" value=""><h2 style="text-align: right;">log in&nbsp;&nbsp;</h2></a>
<h2 style="text-align: center;"><font face="serif">ONE PIECE</font></h2>
<div><font face="serif">ロジャー</font></div>
<div><font face="serif">date</font></div>
<div style="text-align: center;"><font face="serif">youtube</font></div>
<iframe Width: 100%; height: auto src="https://www.youtube.com/embed/dM7x1PNZDo0?si=7UYvk7iGMuybbLTV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
<div style="text-align: center;">
  <font face="serif"><br /></font>
</div>
<div style="text-align: center;"><font face="serif">ラフテル</font></div>
<div style="text-align: center;">
  <font face="serif"><br /></font>
</div>
<div style="text-align: center;"><font face="serif">ラフテルへ行き、海賊王になりました</font></div>
<div style="text-align: center;">
  <font face="serif"><br /></font>
</div>
<div style="text-align: center;"><font face="serif">spot1</font></div>
<div style="text-align: center;">
  <font face="serif"><br /></font>
</div>
<div style="text-align: center;">
    <img src="img/one4.png" width="400" height="260"/>
  <font face="serif"><br /></font>
</div>
<div style="text-align: center;"><br /></div>
<div style="text-align: center;">sentence</div>
<div style="text-align: center;"><br /></div>
<div style="text-align: center;">
  <div>
    <img src="img/one5.png" width="400" height="260"/>
    <font face="serif"><br /></font>
  </div>
  <div><br /></div>
  <div>sentence</div>
  <div><br /></div>
  <div>
    <div>
    <img src="img/one6.png" width="400" height="260"/>
      <font face="serif"><br /></font>
    </div>
    <div><br /></div>
    <div>sentence</div>
  </div>
  <div><br /></div>
  <a onclick="location.href='../AnotherSky/menu.php'" value=""><font face="serif">戻る</font></a>
</div>-->
<?php
    require_once "DBManager.php";
    $get = new DBManager();

    $post_id = $_GET["post"];
    $post = $get->get_post($post_id);

    require_once "header.php";
?>
    
    <?php
    /*echo 'post_id : ';
    echo $post["post_id"].'<br>';*/
    
    echo '<div class="maru"> ';
    echo $post["title"]."<br>";

    /*echo '<div class="mara"> ';
    echo $post["name"]."<br>";*/

    echo ' <br>';
    echo '<div>'.$post["link_path"]."</div><br>";

    echo '';
    echo $post["date"]."<br>";

    echo '';
    echo $post["region"][0]."<br>";

    echo '';
    echo $post["place"]."<br>";
    
    echo '<br>';
    echo $post["text"]."<br>";

    $spot_limit = 4; // 投稿内のスポット数の上限
    for($i = 1; $i <= $spot_limit; $i++) {
        echo '<div class="input">----------------------------------------------------------------------------------------------------<br>';
        echo '[spot'.$i.']<br>';

        if(isset($post["images"])){
            foreach($post["images"] as $image){
                if($image["image_order"] == $i){
                    echo '<img src="'.$image["path"].'" width=560>';
                }
            }
        }

        if(isset($post["sentences"])){
            foreach($post["sentences"] as $sentence){
                if($sentence["sentence_order"] == $i){
                    echo $sentence["sentence"];
                }
            }
        }

        echo '<br>';

    }

    ?>
</body>
</html>


