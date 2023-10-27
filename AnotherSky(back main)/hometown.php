<?php
    require_once "tmp_test.php";
    require_once "DBManager.php";

    $template = new Template();
    $get = new DBManager();
    
    $template->head("hometown");
    $template->header();

    $posts = $get->get_all_post();

    foreach($posts as $post){
        echo '<div class="box" style="display: none">----------------------------------------------------------------------------------------------------<br>';
        echo '<a href="hometown_detail.php?post='.$post["post_id"].'">'.$post["place"].'</a>　　　';
        echo $post["date"].'<br>';
        if(isset($post["first_image"])){
            echo '<img width=560 src="'.$post["first_image"].'"><br>';
        }
        echo '<div style="width:560px">'.$post["text"].'</div>';
        echo '----------------------------------------------------------------------------------------------------</div>';
    }
?>
    <button type="button" id="more" style="margin: 50px 0">more view...</button>
    <button type="button" onclick="location.href='post.php'" style="width: 100%; height:50px; margin-bottom: 50px">
        投稿する
    </button>
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