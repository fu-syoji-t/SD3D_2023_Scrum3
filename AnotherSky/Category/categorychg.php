<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/hometown.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <?php  require_once '../!Mng/header.php' ?>
</div>
<div></div>
<div>
  <h2>
    <div style="text-align: center;"></div>
    <div style="text-align: center;">
      <font face="serif">
      <br />
        <span style="font-size: 36px;">中国</span>
        <br />
      </font>
    </div>
  </h2>
</div>

  </head>
  <body>

    <?php  require_once '../!Mng/header.php' ?>
    <?php
require_once "../!Mng/DBManager.php";
$get = new DBManager();

$posts = $get->get_all_posts();

foreach ($posts as $post) {
    // 記事が「海外」カテゴリーに属しているか確認
    if ($post["region_id"] == "6") {
        echo '<div class="box">
        <h2>
          <a href="../Hometown/hometown_detail.php?post=' . $post["post_id"] . '">' . $post["place"] . '</a>
          <span class="date">(' . date('Y.m.d', strtotime($post["date"])) . ')</span>
        </h2>';
        if (isset($post["first_image"])) {
            echo
                '<p class="box_img">
            <img src="' . $post["first_image"] . '" alt="サムネイル" width="150" height="150">
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
}
?>

  <div style="width: 100%; background-color: #bbb">
    <button type="button" class="more" id="more">read more...</button>
  </div>
    <?php  require_once '../!Mng/footer.php' ?>
  </body>

</body>
</html>
<script>
  var div = 5;
  var c_box = 0;

  var boxes = document.getElementsByClassName("box");
  var moreElem = document.getElementById("more");

  while(c_box < boxes.length) {
    if(c_box < div) {
      boxes[c_box].style.display = "block";
    }	else {
      break;
    }
    c_box++;
  }

  document.addEventListener("click", function (event) {
    if (event.target == moreElem) {
      var i = c_box;
      while(c_box < i + div && c_box < boxes.length) {
        boxes[c_box].style.display = "block";
        c_box++;
      }
    }
  });
</script>
