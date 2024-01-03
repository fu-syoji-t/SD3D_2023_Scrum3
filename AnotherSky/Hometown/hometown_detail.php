<?php
    session_start();
    if(isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    }else{
        $user_id = 0;
    }

    require_once "../!Mng/DBManager.php";
    $get = new DBManager();

    $post_id = $_GET["post"];
    $post = $get->get_post($post_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post["title"];?></title>
    <link rel="icon" href="../img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    body{
        background-color: #DDDDDD;
        text-align: center;
    }
    .hurt{
        /*border: none;
        background-color: transparent;*/
        font-size: 2rem;
        margin-right: -300px;
    }
</style>
<body>
    <?php
    require_once "../!Mng/header.php";

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


    //spotの表示
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


    if(isset($_SESSION['user_id'])){
        $label_function = 'changelabel(); sendFormData()';
    }else{
        $label_function = 'login_alert()';
    }

    $keep = $get->get_keep_post_flag($post_id, $user_id);
    
    $label_true_color = "#ff0000";
    $label_false_color = "#aaaaaa";
    if(empty($keep)){
        $label_flag = -1;
        $label_color = $label_false_color;
    }else{
        $label_flag = 1;
        $label_color = $label_true_color;
    }

    ?>

    <button class="hurt" type="button" id="label" onclick="<?php echo $label_function ?>" style="color: <?php echo $label_color ?>">♥</button>
    <br>
    <form id="keep_post" action="hometown_keep_post(b).php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
        <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
    </form>
    <?php  require_once '../!Mng/footer.php' ?>
</body>
</html>
  <script>
    var label= document.getElementById("label");
    var label_flag = <?php echo $label_flag ?>;
    function changelabel(){
      if(label_flag == 1){
        label.style.color = "<?php echo $label_false_color ?>";
      }else{
        label.style.color = "<?php echo $label_true_color ?>";
      }
      label_flag = -label_flag;
    }

    function login_alert(){
        alert("ログインが必要です");
    }


  // フォームAJAX通信用関数　formタグの属性を空
  // データ送信と画面遷移を分離　遷移コントロールのため
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



