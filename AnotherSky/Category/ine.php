<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
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
    height: 210px;
    margin: 30px auto;
    overflow: hidden;
    padding : 15px;
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
  </style>
<?php  require_once '../!Mng/header.php' ?>
<body>
  
</body>
</html>
<?php
require_once "../!Mng/DBManager.php";
$get = new DBManager();

// 仮のkeep_idを指定
$keep_id = 2;

// keep_idに関連するデータを取得
$posts = $get->get_posts_by_keep_id($keep_id);
foreach ($posts as $post) {
    echo '<div class="box">
        <h2>
          <a href="../Hometown/hometown_detail.php?post=' . $post["post_id"] . '">' . $post["place"] . '</a>
          <span class="date">(' . date('Y.m.d', strtotime($post["date"])) . ')</span>
        </h2>';
    if (isset($post["first_image"])) {
        echo
            '<p class="box_img">
            <img src="'.$post["first_image"] . '" alt="Thumbnail" width="150" height="150">
          </p>';
    }
    echo
        '<div class="box_sentence">
          <p>
            ' . $post["text"] . '…
            <a href="../Hometown/hometown_detail.php?post=' . $post["post_id"] . '">続きを読む</a>
          </p>
        </div>
      </div>';
}
?>
    <?php  require_once '../!Mng/footer.php' ?>
