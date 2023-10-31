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
        iframe {
          width: 100%;
          height: 300px;
        }

  </style>

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

      echo ' <br>';
      echo 'place <br><br>';
      echo $post["place"]."<br><br>";

      echo '';
      echo $post["region"][0]."<br>";
      echo '<br>';

      echo '';
      echo 'youtube <br>';
      echo '<div>'.$post["link_path"]."</div><br>";

      echo '<br>';
      echo 'freespace <br>';
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
        echo '<img width=500 src="'.$post["images"][$c_image]["path"].'">';
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

    ?>
    <br>
    <form action="hometown_delete.php" method="post">
    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
    <input type="submit" value="投稿を削除">
</form>
    <a href="hometown_edit.php?post=<?php echo $post_id; ?>">編集</a>
        <?php  require_once '../!Mng/footer.php' ?>
</body>
</html>


