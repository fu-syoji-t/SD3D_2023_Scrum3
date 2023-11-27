<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    body{
      background-color: #DDDDDD;
        text-align: center;
    }
    .hurt{
      font-size: large;
      margin-right: -300px;
    }
</style>
<body>

<?php
    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $post_id = $_GET["post"];
    $post = $get->get_post($post_id);

    require_once "../!Mng/header.php";
?>
    
    <?php
      echo"<br>";
      echo '<div class="maru"> ';
      echo $post["date"]."<br>";

      echo ' <br>';
      echo 'title <br><br>';
      echo $post["title"]."<br><br>";

      echo '';
      echo $post["region"][0]."<br>";
      echo '<br>';
      
      echo ' <br>';
      echo 'place <br><br>';
      echo $post["place"]."<br><br>";


      echo '';
      echo 'youtube link <br>';
      echo '<div>'.$post["link_path"]."</div><br>";

      echo '<br>';
      echo 'freespace space <br>';
      echo $post["text"]."<br>";

    // 以下、投稿内のスポット数を計算している（2度手間だが）
    $spot_order = array();
    // それぞれのオーダーを取得、配列に格納
    for($i = 0; $i < count($post["images"]); $i++) {
      $spot_order[] = $post["images"][$i]["image_order"];
    }
    for($i = 0; $i < count($post["sentences"]); $i++) {
      $spot_order[] = $post["sentences"][$i]["sentence_order"];
    }
    // 画像の数とテキストの数の合計
    $spot_n = count($spot_order); // spot_n = スポット数
    // 画像とテキストのオーダーが一致しているときはspot_nを引く
    for($i = 0; $i < count($spot_order); $i++) {
      for($j = $i+1; $j < count($spot_order); $j++) {
        if($spot_order[$i] == $spot_order[$j]) {
          $spot_n--;
        }
      }
    }


    
    $c_image = 0;
    $c_sentence = 0;
    for($i = 0; $i < $spot_n; $i++) {
      echo '<div class="input">';
      echo '[spot'.($i+1).']<br>';
      if(isset($post["images"][$c_image]) && $post["images"][$c_image]["image_order"] == $i) {
        echo '<img width=350px src="'.$post["images"][$c_image]["path"].'">';
        if($c_image < count($post["images"])-1){
          $c_image++;
        }
      }
      if(isset($post["sentences"][$c_sentence]) && $post["sentences"][$c_sentence]["sentence_order"] == $i) {
        echo $post["sentences"][$c_sentence]["sentence"];
        if($c_sentence < count($post["sentences"])-1){
          $c_sentence++;
        }
      }
      echo '</div>';
    }
// //＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
// // お気に入りの状態を取得

// $resultFavorite = $get->$pdo->query("SELECT * FROM keep_posts WHERE post_id = $post_id AND user_id = 2");
// $resultFavorite->execute();

// // お気に入りの状態に応じて表示を変更
// if ($resultFavorite->num_rows > 0) {
//     // お気に入りに保存されている場合
//     echo 'label.textContent="❤️"';
// } else {
//     // お気に入りに保存されていない場合
//     echo 'label.textContent="♡"';
// }



    ?>

    <button class="hurt" type="button" id="label" onclick="changelabel(); sendFormData()">♡</button>
    <a href="hometown_edit.php?post=<?php echo $post_id; ?>">編集</a>
    <br>
    <form id="keep_post" action="hometown_keep_post(b).php" method="post">
    <input type="hidden" name="user_id" value="1">
    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
      <!--<button type="button" id="label"onclick="changelabel(); sendFormData()">♡</button>-->
      <!--<button type="submit" id="label"onclick="changelabel();">♡</button>-->
    </form>
    <?php  require_once '../!Mng/footer.php' ?>
</body>
</html>
  <script>
    var label= document.getElementById("label")
    function changelabel(){
      if(label.textContent == "♡"){
        label.textContent="❤️";
      }else{
        label.textContent="♡";
      }
    }
  // フォームAJAX通信用関数　formタグの属性を空
  // データ送信と画面遷移を分離　遷移コントロールのため
  /*セッション管理と(b)でのJSによる遷移ができたのでいらないかも*/
  function sendFormData() {
      var form = document.querySelector('#keep_post');
      var formData = new FormData(form);

      var xhr = new XMLHttpRequest();
      xhr.open('POST', "hometown_keep_post(b).php");
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

  }

  
  </script>



