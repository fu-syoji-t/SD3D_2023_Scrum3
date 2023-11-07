<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/hometown.css"> 
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
        <span style="font-size: 36px;">Hometown</span>
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

    $posts = array_reverse($get->get_all_posts());

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
  <div style="width: 100%; background-color: #bbb">
    <button type="button" class="more" id="more">read more...</button>
  </div>
    <div class="input">
    <a onclick="location.href='hometown_post_tokou.php'" value=""><font face="serif"><span style="font-size: 36px;">投稿する</span></font></a>
    <?php  require_once '../!Mng/footer.php' ?>
    </div>
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
</script>
<script>
  // G1-4-3, G1-6-1-3
// フォームAJAX通信用関数　formタグの属性を空
// データ送信と画面遷移を分離　遷移コントロールのため
/* セッション管理と(b)でのJSによる遷移ができたのでいらないかも
function sendFormData(url) {
    var form = document.querySelector('form');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.onload = function() {
        if (xhr.status === 200) {
        // リクエストが成功した場合の処理
        console.log('成功:', xhr.responseText);
        // 応答を処理するコードを追加します
        } else {
        // リクエストが失敗した場合の処理
        console.log('エラー:', xhr.status);
        }
    };
    xhr.onerror = function() {
        // リクエストが失敗した場合の処理
        console.log('ネットワークエラー');
    };
    xhr.send(formData);

    history.back();

}*/
</script>
