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
        }

        .box {
          background-color: #FFF;
          box-shadow: 0 5px 5px #999;
          height: 200px;
          margin: 30px auto;
          overflow: hidden;
          padding: 15px;
          width: 400px;
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
        .input{
          text-align: center;
        }
    </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<a onclick="location.href='../AnotherSky/login.php'" value=""><h2 style="text-align: right;">log in&nbsp;&nbsp;</h2></a>
    <?php  require_once 'header.php' ?>
</div>
<div></div>
<div>
  <h2>
    <div style="text-align: center;"></div>
    <div style="text-align: center;">
      <font face="serif">
        <span style="font-size: 36px;">Hometown</span>
        <br />
      </font>
    </div>
  </h2>
</div>

  </head>
  <body>

    <?php  require_once 'header.php' ?>
    <?php
    require_once "DBManager.php";
    $get = new DBManager();

    $posts = $get->get_all_post();

    foreach($posts as $post){
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
    }
?>
    <!--<p onclick="more_view()" class="more">read more...</p>-->
    <div class="input">
    <a onclick="location.href='../AnotherSky/tokou.php'" value=""><font face="serif"><span style="font-size: 36px;">投稿する</span></font></a>
    <?php  require_once 'footer.php' ?>
    </div>
  </body>
<!--
</body>
</html>
<script>
  var div =c_box = 5;

  var boxes = document.getElementsByClassName("box");

  for(var i = 0; i < boxes.length;i++){
    if(i < 5){
      boxes[i].style.display = "block";
    }
  }
  function more_view(){
    var i =c_box;
    while(i < c_box + 5 && i < boxes.length){
      boxes[i].Style.display = "block";
      i++;
    }
    c_box = i;
  }
</script>
<script>
  var div =c_box = 5;

  var boxes = document.getElementsByClassName("box");

  for(var i = 0; i < boxes.length;i++){
    if(i < 5){
      boxes[i].Style.display = "block";
    }
  }
  function more_view(){
    var i =c_box;
    while(i < c_box + 5 && i < boxes.length){
      boxes[i].Style.display = "block";
      i++;
    }
    c_box = i;
  }
</script>

display: none;-->