<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hometown</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/hometown.css"> 
</head>

<style>
    .delete-button {
        background-color: #fff;
        /* ボタンの背景色 */
        color: #000;
        /* ボタンのテキスト色 */
        padding: 1px 1px;
        /* ボタンの内側の余白 */
        border-radius: 4px;
        /* 角丸 */
        margin-left: 680px;
        margin-top: 10px;
        cursor: pointer;
    }

    .delete-button:hover {
       /* background-color: #DDDDDD;
        // ホバー時の背景色
        margin-right: 25px;*/
    }
</style>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<?php  
  require_once '../!Mng/header.php' ;

  require_once "../!Mng/DBManager.php";
  $get = new DBManager();

  switch($_GET["branch"]) {
    case "all":
      $title = 'Hometown';
      $posts = array_reverse($get->get_posts());
      break;
    case "keep":
      $title = 'Keep';
      $posts = array_reverse($get->get_myfavorite_posts(1));
      $get->get_myfavorite_posts(1);
      break;
    case "history":
      $title = 'History';
      $user_id = 1;
      $posts = array_reverse($get->get_posts());
      $posts = array_filter($posts, function ($post) use ($user_id) {
        return $post['user_id'] == $user_id;
      });
      break;
    case "region":
      $regions = $get->get_regions();
      $region_id = $_GET["region"];
      $title = $regions[$region_id-1]["name"];
      $posts = array_reverse($get->get_posts());
      $posts = array_filter($posts, function ($post) use ($region_id) {
        return $post['region_id'] == $region_id;
      });
      break;
    default:
      $posts = [];
  }

?>
</div>
<div></div>
<div>
  <h2>
    <div style="text-align: center;"></div>
    <div style="text-align: center;">
      <font face="serif">
      <br />
        <span style="font-size: 36px;"><?php echo $title ?></span>
        <br />
      </font>
    </div>
  </h2>
</div>

  </head>
  <body>

    <?php
    foreach($posts as $post){
        echo '<div class="box">
        <h2>
          <a href="hometown_detail.php?post='.$post["post_id"].'">'.$post["place"].'</a>
          <span class="date">('.date('Y.m.d',strtotime($post["date"])).')</span>
        </h2>';
        if(isset($post["image_id"])){
          echo 
          '<p class="box_img">
            <img src="'.$post["path"].'" alt="Thumbnail" width="150" height="150">
          </p>';
        }

        if($_GET["branch"] == "history") {
          // 削除ボタンを追加
          echo 
          '<form action="rireki_delete.php" method="post" onsubmit="return confirmDelete()">
              <input type="hidden" name="post_id" value="' . $post["post_id"] . '">
              <div class="delete-button">
              <a href="../hometown/hometown_edit.php?post='. $post["post_id"] . '">編集</a>
              <input type="submit" value="投稿を削除" >
              </div>
          </form>';
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

    echo 
    '<div class="read_more">
      <button type="button" class="more" id="more">read more...</button>
    </div>';

    if($_GET["branch"] == "all") {
      echo
    '<div class="input">
        <a onclick="location.href='."'../hometown/hometown_post.php'".'" value=""><font face="serif"><span style="font-size: 36px;">投稿する</span></font></a>
    </div>';
    }
?>
  
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
  console.log(c_box);

  document.addEventListener("click", function (event) {
    if (event.target == moreElem) {
      var i = c_box;
      while(c_box < i + div && c_box < boxes.length) {
        boxes[c_box].style.display = "block";
        c_box++;
      }
    }
    console.log(c_box);
  });


  function confirmDelete() {
      // 確認ダイアログを表示し、OKなら削除処理を実行、キャンセルなら処理を中止
      return confirm("本当にこの投稿を削除しますか？");
  }
</script>
