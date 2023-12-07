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

    $regions = $get->get_regions();

    $spot_limit = $get->spot_limit;

    $post_id = $_GET["post"];
    $post = $get->get_post($post_id);

    require_once "../!Mng/header.php";

    echo"<br>";
    echo '<div class="maru"> ';
    echo $post["date"]."<br>";
  ?>
  <br>
  <form action="hometown_edit(b).php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="post_id" value="<?php echo $post["post_id"] ?>">
    <label for="title">title</label><br>
    <input type="text" id="title" name="title" style= background-color:#fff; value="<?php echo htmlspecialchars($post["title"]); ?>">
    <br>
    <label for="place">place</label><br>
    <input type="text" id="place" name="place" style= background-color:#fff; value="<?php echo htmlspecialchars($post["place"]); ?>">
    <br>
    <label for="region">region</label><br>
    <select name="region" required>
      <option value="" selected style="color: #888">再選択してください</option>
      <?php
        foreach($regions as $region) {
            echo '<option value='.$region["region_id"].'>'.$region["name"].'</option>';
        }
      ?>
    </select>
    <br>
    <label for="youtube">youtube link</label><br>
    <input type="text" id="youtube" name="youtube" style= background-color:#fff; value="<?php echo htmlspecialchars($post["link_path"]); ?>">
    <br>
    <label for="freespace">free space</label><br>
    <input type="text" id="freespace" name="freespace" style= background-color:#fff; value="<?php echo htmlspecialchars($post["text"]); ?>">
    <br>
    <br>
    <button type="button" id="addSpot">+</button><br>
    <br>
    <?php 
      for($i = 0; $i < $spot_limit; $i++) {
      echo '<div class="spot-container" style="display: ' . ('none') . ';">
      ------------------------------------------------------------<br>
      画像を選択 <br>
      <input type="file" name="post_image'.$i.'" accept="image/*"><br>
      <textarea class="maro" name="sentence'.$i.'" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;具体的なスポット" rows=8 cols=50 style= background-color:#fff;></textarea><br>
      </div>';
      }
    ?>
    <br>
    <?php
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
        // ここにある場合は編集できるテキストボックスを追加
        // <label for="freespace">free space</label><br>
        /* <input type="text" id="freespace" name="freespace" style= background-color:#fff; value="<?php echo htmlspecialchars($post["text"]); ?>"> */

      }
      if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_post"])) {
        $title = $_POST["title"];
        $region = $_POST["region"];
        $place = $_POST["place"];
        $youtube = $_POST["youtube"];
        $freespace = $_POST["freespace"];      
        // DBManager クラスの updatePost メソッドを呼び出して投稿を更新
        $dbManager = new DBManager();
        if ($dbManager->updatePost($post_id, $title, $region, $place, $youtube, $freespace)) {
            echo "投稿が更新されました。";
        } else {
            echo "更新に失敗しました。";
        }
      }
    ?>
    <br>
    <input type="submit" name="update_post" value="更新">
  </form>

  <form id="keep_post" action="hometown_keep_post(b).php" method="post">
    <input type="hidden" name="user_id" value="2">
    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">   
    <!--<button type="button" id="label"onclick="changelabel(); sendFormData()">♡</button>-->
    <!--<button type="submit" id="label"onclick="changelabel();">♡</button>-->
  </form>

  <!-- <input type="submit" name="update_post" value="更新"> -->
  </form>
  <?php  require_once '../!Mng/footer.php' ?>
  <script>
      $(document).ready(function () {
          $('#addSpot').click(function () {
              $('.spot-container:hidden:first').show();
          });
      });
  </script>
</body>
</html>