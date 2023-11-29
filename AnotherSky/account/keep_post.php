<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/hometown.css"> 
  <title>Document</title>
</head>
<?php  require_once '../!Mng/header.php' ?>
<body>
  
</body>
</html>
<?php
require_once "../!Mng/DBManager.php";
$get = new DBManager();

// 仮のkeep_idを指定
$keep_id = 1;

// keep_idに関連するデータを取得
$posts = array_reverse($get->get_posts_by_keep_id($keep_id));
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
